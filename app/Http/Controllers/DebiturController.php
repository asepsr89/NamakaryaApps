<?php

namespace App\Http\Controllers;

use App\Http\Requests\DebiturRequest;
use App\Models\Cabang;
use App\Models\Debitur;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon;
use Illuminate\Support\Facades\DB;
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
         ->editColumn('tglPengajuan',function($row){
         return $row->created_at->format('d-m-Y');
         })
         ->editColumn('created_at',function($row){
         return $row->created_at->format('d-m-Y');
         })
         ->addColumn('action', function($row){
        
        if(Gate::allows('update debitur')){

            $btn = '<a href="debitur/'.$row->id.'/editdata" data-toggle="tooltip" data-id="'.$row->id.'"
                data-original-title="Edit"
                class="edit btn btn-primary btn-sm editCabang">Edit</a>';
        }
         if(Gate::allows('delete debitur')){
         $btn .= ' <button type="button" data-id='.$row->id.' data-jenis="delete"
             class="btn btn-danger btn-sm action">Delete</button>';
         }

         return $btn;
         })

         ->editColumn('sttsPengajuan',function($data){
            $var = Gate::allows('read status');
            if($var == 1 ){
                $approve = '<a href="debitur/'.$data->id.'/edit" data-toggle="tooltip" data-id="'.$data->id.'"
                    data-original-title="Edit" class="btn btn-success btn-sm pengajuan">Pengajuan Slik</a>';
                $kirimcabang = '<a href="debitur/'.$data->id.'/kirim" data-toggle="tooltip" data-id="'.$data->id.'"
                    data-original-title="Edit" class="edit btn btn-success btn-sm editCabang">Kirim data cabang</a>';

                $cekfasilitas = '<a href="fasilitas" data-toggle="tooltip" data-id="'.$data->id.'"
                    data-original-title="Edit" class="edit btn btn-success btn-sm editCabang">Cek Pengajuan Fasilitas</a>';

                if($data->sttsPengajuan == 0){
                    return $approve;
                }elseif($data->sttsPengajuan == 1){
                    return '<a class="btn btn-warning btn-sm text-white">Proses cek slik</a>';
                }elseif($data->sttsPengajuan == 2){
                    return $kirimcabang;
                }elseif($data->sttsPengajuan == 3){
                    return '<a class="btn btn-danger btn-sm text-white">Slik Reject</a>';
                }elseif($data->sttsPengajuan == 4){
                    return '<div class="d-inline p-2 bg-primary text-white">Proses Cabang</div>';
                }elseif($data->sttsPengajuan == 5){
                    return '<div class="d-inline p-2 bg-primary text-white">Proses Cabang</div>';
                }elseif($data->sttsPengajuan == 6){
                    return $cekfasilitas;
                }elseif($data->sttsPengajuan == 7){
                    return '<div class="d-inline p-2 bg-warning text-white">Proses Mitra</div>';
                }elseif($data->sttsPengajuan == 8){
                    return '<div class="d-inline p-2 bg-danger text-white">Reject Fasilitas</div>';
                }
            }elseif($var == 0){
                $inputpinjaman = '<a href="fasilitas/'.$data->id.'/edit" data-toggle="tooltip" data-id="'.$data->id.'"
                    data-original-title="Edit" class="edit btn btn-success btn-sm">Input Fasilitas</a>';

                $kirimpusat = '<a href="fasilitas/'.$data->id.'/kirimpusat" data-toggle="tooltip" data-id="'.$data->id.'"
                    data-original-title="Edit" class="edit btn btn-success btn-sm">Kirim pusat</a>';

                if($data->sttsPengajuan == 0){
                    return '<div class="d-inline p-2 bg-primary text-white">Proses Pengajuan slik</div>';
                }elseif($data->sttsPengajuan == 1){
                    return '<a class="btn btn-warning btn-sm text-white">Proses cek slik</a>';
                }elseif($data->sttsPengajuan == 2){
                    return '<a class="btn btn-info btn-sm text-white">Proses cek slik Pusat</a>';
                }elseif($data->sttsPengajuan == 3){
                    return '<a class="btn btn-danger btn-sm text-white">Slik Reject</a>';
                }elseif($data->sttsPengajuan == 4){
                    return $inputpinjaman;
                }elseif($data->sttsPengajuan == 5){
                    return $kirimpusat ;
                }elseif($data->sttsPengajuan == 6){
                    return '<a class="btn btn-primary btn-sm text-white">Proses Fasilitas Pusat</a>';
                }elseif($data->sttsPengajuan == 7){
                    return '<a class="btn btn-primary btn-sm text-white">Proses Proses Mitra</a>';
                }elseif($data->sttsPengajuan == 8){
                    return '<a class="btn btn-danger btn-sm text-white">Reject Fasilitas</a>';
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
        return view('debitur.create',compact('cabang','nomor_anggota'));
    }

    private function generateNomorAnggota()
    {
    // Generate nomor registrasi, misalnya dengan format "REG-yyyymmdd-xxx", di mana "xxx" adalah nomor urut
    return 'REG'.date('Y').'-'.str_pad(Debitur::count() + 1, 6, 0, STR_PAD_LEFT);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DebiturRequest $request)
    {
        
        $debitur = Debitur::create($request->all());
        $debitur->addMediaFromRequest('imgKtp')->usingName($debitur->name)->toMediaCollection('images');
        $debitur->addMediaFromRequest('imgKK')->usingName($debitur->name)->toMediaCollection('images');
        $debitur->addMediaFromRequest('imgPsKtp')->usingName($debitur->name)->toMediaCollection('images');
    
        return redirect('debitur')->with('success', 'Data berhasil di simpan!');
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
    public function edit(Debitur $image,$id)
    {
 
        $data=Debitur::find($id);
        $mitra=Mitra::all();
        $image=$data->getMedia('images');
        return view('debitur.edit',compact('image','data','mitra'));
    }

    public function editdata(Debitur $image,$id)
    {
        $data=Debitur::find($id);
        $mitra=Mitra::all();
        $cabang=Cabang::all();
        $image=$data->getMedia('images');
        return view('debitur.editdata',compact('image','data','mitra','cabang'));
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
    public function update(Request $request, Debitur $debitur)
    {
         $debitur->name =$request->name;
         $debitur->noKtp =$request->noKtp;
         $debitur->tlp =$request->tlp;
         $debitur->plafond =$request->plafond;
         $debitur->alamat =$request->alamat;
         $debitur->save();

         return redirect('debitur')->with('success', 'Data Berhasil Di Update');
    }

    public function pengajuanslik(Request $request,$id)
    {

        $debitur = Debitur::find($id);
        $debitur->user_id=Auth()->user()->id;
        $debitur->mitra_id=$request->mitra_id;
        $debitur->sttsPengajuan='1';
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


        $debitur->delete();
            return response()->json([
            'status'=>'success',
            'message'=>'Data berhasil dihapus'
        ]);
    }

}
