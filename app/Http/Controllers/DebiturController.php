<?php

namespace App\Http\Controllers;

use App\Http\Requests\DebiturRequest;
use App\Mail\PengajuanSlikMaillable;
use App\Models\AccountOfficer;
use App\Models\Cabang;
use App\Models\Debitur;
use App\Models\Fasilitas;
use App\Models\Mitra;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Spatie\MediaLibrary\Support\MediaStream;

class DebiturController extends Controller
{

        public function __construct()
        {
            $this->middleware('can:create debitur')->only('create');
            $this->middleware('can:edit debitur')->only('edit');
            $this->middleware('can:update debitur')->only('update');
            $this->middleware('can:delete debitur')->only('delete');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('read debitur');
         if ($request->ajax()) {

        $data = Debitur::latest()->get();
        $user = Auth()->user()->cabang_id;
         if($user == 0){
            $debitur = $data;
         }elseif($user > 1){
            $debitur = $data->where('cabang_id',$user);
         }
         

         return DataTables::of($debitur)
         ->addIndexColumn()
        //  ->editColumn('tglPengajuan',function($row){
        //  return $row->tglPengajuan->format('d-m-Y');
        //  })
         ->editColumn('created_at',function($row){
         return $row->created_at->format('d-m-Y');
         })
         ->addColumn('action', function($row){
        
        if(Gate::allows('update debitur')){

            $btn = '<a href="debitur/'.$row->id.'/editdata" data-toggle="tooltip" data-id="'.$row->id.'"
                data-original-title="Edit"
                class="edit btn btn-primary btn-sm editCabang"><i class="fa fa-pencil"></i></a>';
        }
         if(Gate::allows('delete debitur')){
         $btn .= ' <a type="button" data-id='.$row->id.' data-jenis="delete"
             class="btn btn-danger btn-sm action"><i class="fa fa-trash"></i></a>';
         }

        if(Gate::allows('update debitur')){

        $btn .= ' <a href="debitur/'.$row->id.'/viewdata" data-toggle="tooltip" data-id="'.$row->id.'"
            data-original-title="view" class="edit btn btn-info btn-sm editCabang"><i class="fa fa-eye"></a>';
        }

         return $btn;
         })

         ->editColumn('sttsPengajuan',function($data){
            $var = Gate::allows('read status');
            if($var == 1 ){
                $approve = '<a href="debitur/'.$data->id.'/edit" data-toggle="tooltip" data-id="'.$data->id.'"
                    data-original-title="Edit" class="btn btn-success btn-sm pengajuan">Pengajuan Slik</a>';
                $approve .= ' <a href="debitur/'.$data->id.'/nonSlik" data-toggle="tooltip" data-id="'.$data->id.'"
                    data-original-title="Edit" class="btn btn-warning btn-sm pengajuan">Non Slik</a>';

                $kirimcabang = '<a href="debitur/'.$data->id.'/kirim" data-toggle="tooltip" data-id="'.$data->id.'"
                    data-original-title="Edit" class="edit btn btn-success btn-sm editCabang">Kirim data cabang</a>';

                $cekfasilitas = '<a href="fasilitas" data-toggle="tooltip" data-id="'.$data->id.'"
                    data-original-title="Edit" class="edit btn btn-success btn-sm editCabang">Cek Pengajuan Fasilitas</a>';

                if($data->sttsPengajuan == 0){
                    return $approve;
                }elseif($data->sttsPengajuan == 1){
                    return '<h5><span class="badge badge-info">Proses Cek Slik</span></h5>';
                }elseif($data->sttsPengajuan == 2){
                    return $kirimcabang;
                }elseif($data->sttsPengajuan == 3){
                    return '<h5><span class="badge badge-danger">Reject Slik</span></h5>';
                }elseif($data->sttsPengajuan == 4){
                    return '<h5><span class="badge badge-info">Proses Cabang</span></h5>';
                }elseif($data->sttsPengajuan == 5){
                    return '<h5><span class="badge badge-info">Proses Cabang</span></h5>';
                }elseif($data->sttsPengajuan == 6){
                    return $cekfasilitas;
                }elseif($data->sttsPengajuan == 7){
                    return '<h5><span class="badge badge-info">Proses Mitra</span></h5>';
                }elseif($data->sttsPengajuan == 8){
                    return '<a class="btn btn-success btn-sm text-white"><i class="fa fa-check-square"> Approve
                            Fasilitas</i></a>';
                }elseif($data->sttsPengajuan == 9){
                    return '<h5><span class="badge badge-danger"><i class="fa fa-times-rectangle"> Reject
                                Fasilitas</i></span></h5>';
                }
            }elseif($var == 0){
                $inputpinjaman = '<a href="fasilitas/'.$data->id.'/edit" data-toggle="tooltip" data-id="'.$data->id.'"
                    data-original-title="Edit" class="edit btn btn-success btn-sm">Input Fasilitas</a>';

                $kirimpusat = '<a href="fasilitas/'.$data->id.'/kirimpusat" data-toggle="tooltip" data-id="'.$data->id.'"
                    data-original-title="Edit" class="edit btn btn-success btn-sm">Kirim pusat</a>';

                if($data->sttsPengajuan == 0){
                    return '<h5><span class="badge badge-info">Proses Pengajuan Slik</span></h5>';
                }elseif($data->sttsPengajuan == 1){
                    return '<h5><span class="badge badge-info">Proses Slik</span></h5>';
                }elseif($data->sttsPengajuan == 2){
                    return '<h5><span class="badge badge-info">Proses Slik Pusat</span></h5>';
                }elseif($data->sttsPengajuan == 3){
                    return '<h5><span class="badge badge-danger">Reject Slik</span></h5>';
                }elseif($data->sttsPengajuan == 4){
                    return $inputpinjaman;
                }elseif($data->sttsPengajuan == 5){
                    return $kirimpusat ;
                }elseif($data->sttsPengajuan == 6){
                    return '<h5><span class="badge badge-info">Proses Fasilitas Pusat</span></h5>';
                }elseif($data->sttsPengajuan == 7){
                    return '<h5><span class="badge badge-info">Proses Mitra</span></h5>';
                }elseif($data->sttsPengajuan == 8){
                    return '<a class="btn btn-success btn-sm text-white"><i class="fa fa-check-square"> Approve
                            Fasilitas</i></a>';
                }elseif($data->sttsPengajuan == 9){
                    return '<h5><span class="badge badge-danger"><i class="fa fa-times-rectangle"> Reject
                                Fasilitas</i></span></h5>';
                }
            }
         })
         ->editColumn('sttsDebitu',function($data){
            if($data->sttsDebitu == 0){
                return '<span class="badge badge-success">Aktif</span>';
            }elseif($data->sttsDebitu == 1){
                return '<span class="badge badge-danger">Tidak aktif</span>';
            }
         })
        ->editColumn('cabang_id', function($data) {
            return $data->cabang->name;
        })
        ->editColumn('perusahaan_id', function($data) {
            return $data->perusahaan->namaPerusahaan;
        })
        ->editColumn('plafond',function($data){
            return number_format($data->plafond);
        })
         ->rawColumns(['sttsPengajuan','action','sttsDebitu'])
         ->make(true);
         }

         return view('debitur.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nomor_anggota = $this->generateNomorAnggota();
        $cabang = Cabang::all();
        $account = AccountOfficer::all();
        $perusahaan = Perusahaan::all();

        return view('debitur.create',compact('cabang','nomor_anggota','account','perusahaan'));
    }

    private function generateNomorAnggota()
    {
    // Generate nomor registrasi, misalnya dengan format "REG-yyyymmdd-xxx", di mana "xxx" adalah nomor urut
    return 'REG'.date('md').str_pad(Debitur::count() + 1, 6, 0, STR_PAD_LEFT);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DebiturRequest $request)
    {

        try {
            $debitur = Debitur::create([
            'noDebitur' => $request->noDebitur,
            'tglPengajuan' => $request->tglPengajuan,
            'name' => $request->name,
            'ibuKandung' => $request->ibuKandung,
            'noKtp' => $request->noKtp,
            'tlp' => $request->tlp,
            'plafond' => $request->plafond,
            'alamat' => $request->alamat,
            'cabang_id' => $request->cabang_id,
            'accountOfficer_id' => $request->account_id,
            'perusahaan_id'=>$request->perusahaan_id,
            'user_id'=>auth()->user()->id,
            ]);


            foreach ($request->input('document', []) as $file) {

            $debitur->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');

            }


            return redirect('debitur')->with('success', 'Data berhasil di simpan!');

        } catch (\Throwable $th) {
            
            Alert::error('Kesalahan', 'Terjadi kesalahan, harap coba lagi');
        }

        
    }

    public function storeMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
        mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
        'name' => $name,
        'original_name' => $file->getClientOriginalName(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Debitur $debitur)
    {
        $image = $debitur->getMedia();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data=Debitur::find($id);
        $mitra=Mitra::all();
        $perusahaan=Perusahaan::all();
        return view('debitur.edit',compact('data','mitra','perusahaan'));
    }

    public function viewdata(Debitur $image,$id)
    {
        $data = Debitur::find($id);
        $debitur_id = $data->id;

        // $tes = $data->fasilitas()->where('debitur_id',$debitur_id)->get();

                $data = DB::table('debiturs')
                ->join('fasilitas','debiturs.id','=','fasilitas.debitur_id')
                ->where('debitur_id',$debitur_id)
                ->select('debiturs.*','fasilitas.*')
                ->get();

                // return dd($data);

        return view('debitur.viewdata',['fasilitas'=>new Fasilitas()],compact('data'));
    }

    public function editdata(Debitur $image,$id)
    {
        $data=Debitur::find($id);
        $mitra=Mitra::all();
        $cabang=Cabang::all();
        $account=AccountOfficer::all();
        $perusahaan=Perusahaan::all();
        $image=$data->getMedia('images');
        
        return view('debitur.editdata',compact('image','data','mitra','cabang','account','perusahaan'));
    }

    public function nonSlik(Debitur $image,$id)
    {
        $data=Debitur::find($id);
        $mitra=Mitra::all()->where('statusSlik',2);
        $cabang=Cabang::all();
        $account=AccountOfficer::all();
        $perusahaan=Perusahaan::all();
        $image=$data->getMedia('images');
        
        return view('debitur.nonslik',compact('image','data','mitra','cabang','account','perusahaan'));
    }

    public function kirim(Debitur $debitur,$id)
    {
        $debitur = Debitur::find($id);
        $debitur->sttsPengajuan='4';
        $debitur->save();
        return redirect('debitur')->with('success','Data telah terkirim cabang');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $debitur =  Debitur::findOrFail($id);
        $debitur->update($request->all());

        
        if($request->input('new_document',[]) == !null){
            $debitur->clearMediaCollection('document');
        foreach ($request->input('new_document', []) as $file) {
                $debitur->addMedia(storage_path('tmp/uploads/' .
                $file))->toMediaCollection('document');
            }

        }

        return redirect('debitur')->with('success', 'Data Berhasil Di Update');
    }

    public function pengajuanslik(Request $request,$id)
    {

    try{
        $debitur = Debitur::find($id);
        $debitur->user_id=Auth()->user()->id;
        $debitur->mitra_id=$request->mitra_id;
        $debitur->sttsPengajuan='1';
        $debitur->save();

        //send email

        $user_id = $debitur->mitra_id;
        $mitra = Mitra::find($user_id);

            Mail::to($mitra->email)->send(new PengajuanSlikMaillable($debitur));

            return redirect('debitur')->with('success','Pengajuan Slik di kirim');
            
        }catch(\Exception $e){

            return redirect('debitur')->with('success','Tidak mengirim email');
        }

    }

    public function pengajuannonslik(Request $request,$id)
    {
            $debitur = Debitur::find($id);
            $debitur->user_id=Auth()->user()->id;
            $debitur->mitra_id=$request->mitra_id;
            $debitur->sttsPengajuan='4';
            $debitur->save();

            return redirect('debitur')->with('success','Pengajuan Slik di kirim');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debitur $debitur)
    {
        
        // delete previous image in the database
        $query = DB::table('media')->where('id', $debitur);

        if ($query->count() > 0) :
        $query->delete();
        endif;

            $debitur_id = $debitur->id;

        $data = DB::table('debiturs')
            ->join('fasilitas','debiturs.id','=','fasilitas.debitur_id')
            ->where('debitur_id',$debitur_id);

            if($data->count() > 0){
                return response()->json([
                    'status'=>'error',
                    'message'=>'Data debitur tidak dapat di hapus fasilitas aktif'
                ]);
            } else{
                $debitur->delete();
                return response()->json([
                'status'=>'success',
                'message'=>'Data berhasil dihapus'
                ]);
            }
                
    }

}
