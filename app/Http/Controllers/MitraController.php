<?php

namespace App\Http\Controllers;

use App\Http\Requests\FasilitasRequest;
use App\Models\Cabang;
use App\Models\Debitur;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;
use Yajra\DataTables\DataTables;

class FasilitasController extends Controller
{

        public function __construct()
        {
        $this->middleware('can:create pinjaman')->only('create');
        $this->middleware('can:delete pinjaman')->only('destory');
        $this->middleware('can:update pinjaman')->only('update');
        $this->middleware('can:update pinjaman')->only('edit');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('read pinjaman');
        if ($request->ajax()) {

        $data = Fasilitas::latest()->get();
        $cabang = auth()->user()->cabang_id;
        $mitra = auth()->user()->mitra_id;

        if($cabang == !null ){
            $fasilitas = $data->where('cabang_id',$cabang);
        }elseif($mitra == !null){
            $fasilitas = $data->where('mitra_id',$mitra);
        }else{
            $fasilitas = $data;
        }

            return DataTables::of($fasilitas)
                ->addIndexColumn()

            ->editColumn('status',function($data){

                if(Gate::allows('read status')){
                    $cekfasilitas = '<a href="fasilitas/'.$data->id.'/cekFasilitas" data-toggle="tooltip" data-id="'.$data->id.'"
                        class="edit btn btn-success btn-sm ">Cek Fasilitas</a>';

                        
                    $cekfasilitas .= ' <a href="fasilitas/'.$data->id.'/download" data-toggle="tooltip" data-id="'.$data->id.'"
                        class="edit btn btn-primary btn-sm ">Download Berkas</a>';

                    $kirimMitra = '<a href="fasilitas/'.$data->id.'/kirimmitra" data-toggle="tooltip" data-id="'.$data->id.'"
                        class="edit btn btn-warning btn-sm ">Kirim Mitra</a>';
                        
                    $kirimMitra .= ' <a href="fasilitas/'.$data->id.'/download" data-toggle="tooltip" data-id="'.$data->id.'"
                        class="edit btn btn-primary btn-sm ">Download Berkas</a>';

                    $kirimMitra .=  ' <a href="fasilitas/'.$data->id.'/cekFasilitas" data-toggle="tooltip" data-id="'.$data->id.'" 
                        class="edit btn btn-secondary btn-sm ">Info Fasiitas</a>';

                    $revisimitra = '<a href="fasilitas/'.$data->id.'/revisifasilitasmitra" data-toggle="tooltip" data-id="'.$data->id.'"
                        class="edit btn btn-success btn-sm ">Revisi Fasilitas</a>';

                    if($data->status == 2){
                        return $cekfasilitas;
                    }elseif($data->status == 3){
                        return '<span class="badge badge-danger">Revisi Cabang</span>';
                    }elseif($data->status == 4){
                        return $kirimMitra;
                    }elseif($data->status == 5){
                        return '<span class="badge badge-danger">Reject Fasilitas</span>';
                    }elseif($data->status == 6){
                        return '<span class="badge badge-warning">Proses Mitra</span>';
                    }elseif($data->status == 7){
                        return $revisimitra;
                    }elseif($data->status == 8){
                        return '<span class="badge badge-info">Approve Fasilitas Mitra</span>';
                    }

                }elseif(Gate::allows('read status cabang')){
                    $otorisasi = '<a href="fasilitas/'.$data->id.'/otorisasi" data-toggle="tooltip" data-id="'.$data->id.'"
                        class="edit btn btn-success btn-sm ">Otorisasi Fasilitas</a>';

                    $revisi = '<a href="fasilitas/'.$data->id.'/revisifasilitas" data-toggle="tooltip" data-id="'.$data->id.'"
                        class="edit btn btn-success btn-sm ">Revisi Fasilitas</a>';

                
                    if($data->status == 1){
                        return $otorisasi;
                    }elseif($data->status == 2){
                        return '<span class="badge badge-info">Cek Fasilitas Pusat</span>';
                    }elseif($data->status == 3){
                        return $revisi;
                    }elseif($data->status == 4){
                        return '<span class="badge badge-success">Approve Pusat</span>';
                    }elseif($data->status == 5){
                        return '<span class="badge badge-danger">Reject Fasilitas</span>';
                    }elseif($data->status == 6){
                        return '<span class="badge badge-warning">Proses Mitra</span>';
                    }elseif($data->status == 7){
                        return '<span class="badge badge-warning">Revisi Pusat</span>';
                    }elseif($data->status == 8){
                        return '<span class="badge badge-info">Approve Fasilitas Mitra</span>';
                    }

                }elseif(Gate::allows('read status mitra')){

                    $cekfasilitasmitra = '<a href="fasilitas/'.$data->id.'/cekFasilitasmitra" data-toggle="tooltip" data-id="'.$data->id.'"
                        class="edit btn btn-success btn-sm ">Cek Fasilitas</a>';

                        
                    $cekfasilitasmitra .= ' <a href="fasilitas/'.$data->id.'/download" data-toggle="tooltip" data-id="'.$data->id.'"
                        class="edit btn btn-primary btn-sm ">Download Berkas</a>';


                   if($data->status == 2){
                     return '<span class="badge badge-info">Cek Fasilitas Pusat</span>';
                   }elseif($data->status == 3){
                        return '<span class="badge badge-info">Revisi cabang</span>';
                    }elseif($data->status == 4){
                        return '<span class="badge badge-success">Approve Pusat</span>';
                    }elseif($data->status == 5){
                        return '<span class="badge badge-danger">Reject Fasilitas</span>';
                    }elseif($data->status == 6){
                        return $cekfasilitasmitra;
                    }elseif($data->status == 7){
                        return '<span class="badge badge-info">Revisi Pusat</span>';
                    }elseif($data->status == 8){
                        return '<span class="badge badge-info">Approve Fasilitas Mitra</span>';
                    }elseif($data->status == 9){
                        return '<span class="badge badge-danger">Reject fasilitas</span>';
                    }
                }

            })
            ->editColumn('cabang_id',function($data){
                return $data->cabang->name;
            })
            ->editColumn('mitra_id',function($data){
                return $data->mitra->name;
            })
            ->editColumn('debitur_id',function($data){
                return $data->debitur->name;
            })
            ->addColumn('tglPengajuan',function($data){
                return $data->debitur->tglPengajuan;
            })
            ->addColumn('noKtp',function($data){
                return $data->debitur->noKtp;
            })
            ->addColumn('plafond',function($data){
                return number_format($data->debitur->plafond);
            })
            ->rawColumns(['status','cabang_id','mitra_id'])
            ->make(true);
        }

        return view('fasilitas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FasilitasRequest $request)
    {
        
        $nomor_fasilitas = $this->generateNomorAnggota();
        $data = $request->all();
        $data['status'] = '1';
        $data['noFasilitas'] = $nomor_fasilitas;
        $fasilitas = Fasilitas::create($data);
        // if($request->input('new_document',[]) == !null){
        //     $fasilitas->clearMediaCollection('docs');
        // foreach ($request->input('new_document', []) as $file) {
        //         $fasilitas->addMedia(storage_path('tmp/uploads/' .
        //         $file))->toMediaCollection('docs');
        //     }

            foreach ($request->input('document',[])as $file) {
                $fasilitas->addMedia(storage_path('tmp/uploads/' .
                $file))->toMediaCollection('docs');
            }
        return redirect('fasilitas')->with('success', 'Data Berhasil Di simpan');

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

    

    private function generateNomorAnggota()
        {
            // Generate nomor registrasi, misalnya dengan format "REG-yyyymmdd-xxx", di mana "xxx" adalah nomor urut
        return 'FAS'.date('Ym').str_pad(Fasilitas::count() + 1, 6, 0, STR_PAD_LEFT);
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $data = Debitur::find($id);

            return view('fasilitas.pemberkasan',['fasilitas'=>new Fasilitas()],compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->status='2';
        $fasilitas->save();

         $fasilitas->update($request->all());
        
        if($request->input('new_document',[]) == !null){
            $fasilitas->clearMediaCollection('docs');
        foreach ($request->input('new_document', []) as $file) {
                $fasilitas->addMedia(storage_path('tmp/uploads/' .
                $file))->toMediaCollection('docs');
            }

        $debitur_id = $fasilitas->debitur_id;
        $debitur = Debitur::find($debitur_id);
        $debitur->status='5';
        $debitur->save();
        
        }

        return redirect('fasilitas')->with('success', 'Data Berhasil Di Update');
    }

    public function updatemitra(Request $request,$id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->status='6';
        $fasilitas->save();

         $fasilitas->update($request->all());
        
        if($request->input('new_document',[]) == !null){
            $fasilitas->clearMediaCollection('docs');
        foreach ($request->input('new_document', []) as $file) {
                $fasilitas->addMedia(storage_path('tmp/uploads/' .
                $file))->toMediaCollection('docs');
            }

        $debitur_id = $fasilitas->debitur_id;
        $debitur = Debitur::find($debitur_id);
        $debitur->status='7';
        $debitur->save();
        
        }

        return redirect('fasilitas')->with('success', 'Data Berhasil Di Update');
    }

    Public function revisifasilitas(Request $request,$id)
    {
        $data = Fasilitas::find($id);
        $debitur_id = $data->debitur_id;

        $debitur = Debitur::find($debitur_id);

        return view('fasilitas.revisifasilitas',compact('data','debitur'));
    }

    Public function revisifasilitasmitra(Request $request,$id)
    {
        $data = Fasilitas::find($id);
        $debitur_id = $data->debitur_id;

        $debitur = Debitur::find($debitur_id);

        return view('fasilitas.revisifasilitasmitra',compact('data','debitur'));
    }
    

    public function otorisasi(Fasilitas $fasilitas,$id)
    {
        $fasilitas=Fasilitas::findOrFail($id);
        $fasilitas->status='2';
        $fasilitas->save();

        $debitur_id = $fasilitas->debitur_id;

        $debitur = Debitur::find($debitur_id);
        $debitur->sttsPengajuan='5';
        $debitur->save();

        return redirect('fasilitas')->with('success','Data fasilitas sudah di otorisasi');
    }

    public function kirimpusat(Request $request,$id)
    {
        $debitur = Debitur::find($id);
        $debitur->sttsPengajuan='6';
        $debitur->save();
        return redirect('debitur')->with('success','Data fasilitas sudah di otorisasi');
    }

    public function checkFasilitas(Fasilitas $fasilitas,$id)
    {
            $data = Fasilitas::find($id);
            $debitur_id = $data->debitur_id;

            $debitur = Debitur::find($debitur_id);

            return view('fasilitas.cekfasilitas',['fasilitas'=>new Fasilitas()],compact('data','debitur'));
    }

    public function download(Fasilitas $fasilitas,$id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $imagesToDownload = $fasilitas->getMedia('docs');
        return MediaStream::create($fasilitas->noFasilitas.'.zip')->addMedia($imagesToDownload);
    }

    public function approve(Fasilitas $fasilitas,$id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->status='4';
        $fasilitas->save();

        $debitur_id = $fasilitas->debitur_id;
        $debitur = Debitur::find($debitur_id);
        $debitur->sttsPengajuan='7';
        $debitur->save();

        return redirect('debitur')->with('success','Fasilitas berhasil approve');
    }

        public function reject(Fasilitas $fasilitas,$id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->status='5';
        $fasilitas->save();

        $debitur_id = $fasilitas->debitur_id;
        $debitur = Debitur::find($debitur_id);
        $debitur->sttsPengajuan='9';
        $debitur->save();

        return redirect('debitur')->with('success','Fasilitas Reject');

    }

    public function revisi(Request $request,$id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->note = $request->note;
        $fasilitas->status = '3';
        $fasilitas->save();

        return redirect('fasilitas')->with('success','Revisi Fasilitas Berhasil disimpan');
    }  
    
    public function revisiPlafond(Request $request,$id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->PlafondRekomen = $request->plafondRekomen;
        $fasilitas->note = $request->note;
        $fasilitas->status = '3';
        $fasilitas->save();

        return redirect('fasilitas')->with('success','Revisi Fasilitas Berhasil disimpan');
    }   

    public function kirimmitra(Fasilitas $fasilitas,$id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->status='6';
        $fasilitas->save();
        return redirect('fasilitas')->with('success','Data fasilitas terkirim mitra');
    }   

    public function checkFasilitasmitra(Fasilitas $fasilitas,$id)
    {
        $data = Fasilitas::find($id);
        $debitur_id = $data->debitur_id;

        $debitur = Debitur::find($debitur_id);

        return view('mitra.cekfasilitasmitra',['fasilitas'=>new Fasilitas()],compact('data','debitur'));
    }

    public function approvemitra(Fasilitas $fasilitas,$id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->status='8';
        $fasilitas->save();

        $debitur_id = $fasilitas->debitur_id;
        $debitur = Debitur::find($debitur_id);
        $debitur->sttsPengajuan='9';
        $debitur->save();

        return redirect('fasilitas')->with('success','Fasilitas berhasil approve');
    }

    public function revisimitra(Request $request,$id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->notemitra = $request->notemitra;
        $fasilitas->status = '7';
        $fasilitas->save();

         return redirect('fasilitas')->with('success','Revisi Fasilitas Berhasil disimpan');
    } 
    
    public function rejectmitra(Fasilitas $fasilitas,$id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->status='9';
        $fasilitas->save();

        $debitur_id = $fasilitas->debitur_id;
        $debitur = Debitur::find($debitur_id);
        $debitur->sttsPengajuan='9';
        $debitur->save();

        return redirect('fasilitas')->with('success','Fasilitas berhasil approve');
    }

    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
