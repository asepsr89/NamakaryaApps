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
            $user = auth()->user()->cabang_id;

                if($user == 0){
                    $fasilitas = $data;
                }elseif($user > 1){
                    $fasilitas = $data->where('cabang_id',$user);
                }

            return DataTables::of($fasilitas)
                ->addIndexColumn()

            ->editColumn('status',function($data){

                $var = Gate::allows('read status');
                if($var == 1){
                    

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
                }
        
                }elseif($var == 0){
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
                    }
                }
  
            })
            ->editColumn('cabang_id',function($data){
                return $data->cabang->name;
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
            ->rawColumns(['status','cabang_id'])
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
        $fasilitas->addMediaFromRequest('fileBerkas')->usingName($fasilitas->noFasilitas)->toMediaCollection('docs');

        return redirect('fasilitas')->with('success', 'Data Berhasil Di simpan');
   
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

        if($request->hasFile('fileBerkas')){
            $fasilitas->clearMediaCollection('docs');
            $fasilitas->addMediaFromRequest('fileBerkas')->usingName($fasilitas->noFasilitas)->toMediaCollection('docs');
            $fasilitas->debitur_id = $request->debitur_id;
            $fasilitas->cabang_id = $request->cabang_id;
            $fasilitas->noFasilitas = $request->noFasilitas;
            $fasilitas->noDebitur = $request->noDebitur;
            $fasilitas->tglLahir = $request->tglLahir;
            $fasilitas->tmpLahir = $request->tmpLahir;
            $fasilitas->namaPasangan = $request->namaPasangan;
            $fasilitas->tglLahirPasangan = $request->tglLahirPasangan;
            $fasilitas->pendidikan = $request->pendidikan;
            $fasilitas->stsKawin = $request->stsKawin;
            $fasilitas->npwp = $request->npwp;
            $fasilitas->alamatSkrng = $request->alamatSkrng;
            $fasilitas->stsTinggal = $request->stsTinggal;
            $fasilitas->jnsPekerjaan = $request->jnsPekerjaan;
            $fasilitas->namaPerusahaan = $request->namaPerusahaan;
            $fasilitas->tlpPerusahaan = $request->tlpPerusahaan;
            $fasilitas->lamaBekerja = $request->lamaBekerja;
            $fasilitas->penghasilan = $request->penghasilan;
            $fasilitas->bukuNikah = $request->bukuNikah;
            $fasilitas->aktaCerai = $request->aktaCerai;
            $fasilitas->fotoPeminjam = $request->fotoPeminjam;
            $fasilitas->idCard = $request->idCard;
            $fasilitas->suratHrd = $request->suratHrd;
            $fasilitas->suratBekerja = $request->suratBekerja;
            $fasilitas->slipGaji = $request->slipGaji;
            $fasilitas->mutasiRekening = $request->mutasiRekening;
            $fasilitas->kartuBpjs = $request->kartuBpjs;
            $fasilitas->ijazahTerakhir = $request->ijazahTerakhir;
            $fasilitas->institusiLk = $request->institusiLk;
            $fasilitas->verifPerusahaan = $request->verifPerusahaan;
            $fasilitas->kerjaAnalisis = $request->kerjaAnalisis;
            $fasilitas->surveiLingkungan = $request->surveiLingkungan;
            $fasilitas->fotoRumah = $request->fotoRumah;
            $fasilitas->skoringKredit = $request->skoringKredit;
            $fasilitas->denahLokasi = $request->denahLokasi;
            $fasilitas->mpp = $request->mpp;
            $fasilitas->buktiKepemilikan = $request->buktiKepemilikan;
            $fasilitas->shm = $request->shm;
            $fasilitas->fotoAtm = $request->fotoAtm;
            $fasilitas->payrollPelunasan = $request->payrollPelunasan;
            $fasilitas->executiveSummary = $request->executiveSummary;
            $fasilitas->dokumenTambahan = $request->dokumenTambahan;
            $fasilitas->status = '2';
            $fasilitas->save();
        }else{
            $fasilitas->debitur_id = $request->debitur_id;
            $fasilitas->cabang_id = $request->cabang_id;
            $fasilitas->noFasilitas = $request->noFasilitas;
            $fasilitas->noDebitur = $request->noDebitur;
            $fasilitas->tglLahir = $request->tglLahir;
            $fasilitas->tmpLahir = $request->tmpLahir;
            $fasilitas->namaPasangan = $request->namaPasangan;
            $fasilitas->tglLahirPasangan = $request->tglLahirPasangan;
            $fasilitas->pendidikan = $request->pendidikan;
            $fasilitas->stsKawin = $request->stsKawin;
            $fasilitas->npwp = $request->npwp;
            $fasilitas->alamatSkrng = $request->alamatSkrng;
            $fasilitas->stsTinggal = $request->stsTinggal;
            $fasilitas->jnsPekerjaan = $request->jnsPekerjaan;
            $fasilitas->namaPerusahaan = $request->namaPerusahaan;
            $fasilitas->tlpPerusahaan = $request->tlpPerusahaan;
            $fasilitas->lamaBekerja = $request->lamaBekerja;
            $fasilitas->penghasilan = $request->penghasilan;
            $fasilitas->bukuNikah = $request->bukuNikah;
            $fasilitas->aktaCerai = $request->aktaCerai;
            $fasilitas->fotoPeminjam = $request->fotoPeminjam;
            $fasilitas->idCard = $request->idCard;
            $fasilitas->suratHrd = $request->suratHrd;
            $fasilitas->suratBekerja = $request->suratBekerja;
            $fasilitas->slipGaji = $request->slipGaji;
            $fasilitas->mutasiRekening = $request->mutasiRekening;
            $fasilitas->kartuBpjs = $request->kartuBpjs;
            $fasilitas->ijazahTerakhir = $request->ijazahTerakhir;
            $fasilitas->institusiLk = $request->institusiLk;
            $fasilitas->verifPerusahaan = $request->verifPerusahaan;
            $fasilitas->kerjaAnalisis = $request->kerjaAnalisis;
            $fasilitas->surveiLingkungan = $request->surveiLingkungan;
            $fasilitas->fotoRumah = $request->fotoRumah;
            $fasilitas->skoringKredit = $request->skoringKredit;
            $fasilitas->denahLokasi = $request->denahLokasi;
            $fasilitas->mpp = $request->mpp;
            $fasilitas->buktiKepemilikan = $request->buktiKepemilikan;
            $fasilitas->shm = $request->shm;
            $fasilitas->fotoAtm = $request->fotoAtm;
            $fasilitas->payrollPelunasan = $request->payrollPelunasan;
            $fasilitas->executiveSummary = $request->executiveSummary;
            $fasilitas->dokumenTambahan = $request->dokumenTambahan;
            $fasilitas->status = '3';
            $fasilitas->save();
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
        $debitur->sttsPengajuan='8';
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

    public function kirimmitra(Fasilitas $fasilitas,$id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->status='6';
        $fasilitas->save();
        return redirect('fasilitas')->with('success','Data fasilitas terkirim mitra');
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
