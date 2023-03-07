<?php

namespace App\Http\Controllers;

use App\Models\Analis;
use App\Models\Cabang;
use App\Models\Debitur;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;
use Alert;
use App\Models\Bankloan;

class AnalisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fasilitas = DB::table('debiturs')
            ->join('fasilitas','debiturs.id','=','fasilitas.debitur_id')
            ->select('debiturs.*','fasilitas.*')
            ->get();

        $cabang = Cabang::all();

        return view('analis.index',compact('fasilitas','cabang'));
    }

    public function getdata(Request $request)
    {
        $data = DB::table('debiturs')
            ->join('fasilitas', 'debiturs.id', '=', 'fasilitas.debitur_id')
            ->where('debiturs.noDebitur', $request->noDebitur)
            ->select('debiturs.*','fasilitas.*')
            ->first();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $analis = new Analis;
        $analis->debitur_id = $request->debitur_id;
        $analis->fasilitas_id = $request->debitur_id;
        $analis->cabang_id = $request->cabang_id;
        $analis->tglMpp = $request->tglMpp;
        $analis->jenisFasilitas = $request->jenisFasilitas;
        $analis->noSurat = $request->tujuanFasilitas;
        $analis->tujuanFasilitas = $request->debitur_id;
        $analis->area = $request->debitur_id;
        $analis->namaLo = $request->namaLo;
        $analis->namaCollection = $request->namaCollection;
        $analis->namaTl = $request->namaTl;
        $analis->alamatPerusahaan = $request->alamatPerusahaan;
        $analis->rate = $request->rate;
        $analis->tenor = $request->tenor;
        $analis->noKontrak = $request->noKontrak;
        $analis->dataJaminan = $request->dataJaminan;
        $analis->noBPJS = $request->noBPJS;
        $analis->saldoBpjs = $request->debitur_id;
        $analis->jenisPengajuan = $request->jenisPengajuan;
        $analis->deskripsi = $request->deskripsi;
        $analis->save();

        $analis_number = DB::table('analis')->orderBy('analis_number','DESC')->select('analis_number')->first();
        $analis_number = $analis_number->analis_number;

        foreach($request->bankName as $key => $bankNames)
            {
                $bankLoan['analis_number']  = $analis_number;
                $bankLoan['bankName']       = $bankNames;
                $bankLoan['loan']           = $request->loan[$key];
                $bankLoan['outstanding']    = $request->outstanding[$key];
                $bankLoan['angsuran']       = $request->angsuran[$key];
                $bankLoan['tujuanPinjaman'] = $request->tujuanPinjaman[$key];
                $bankLoan['keterangan']     = $request->keterangan[$key];
                $bankLoan['statusPinjaman'] = $request->statusPinjaman[$key];



                Bankloan::create($bankLoan);
            }

        return redirect('analis')->with('success', 'Data berhasil di simpan!');
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
        //
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
        //
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
