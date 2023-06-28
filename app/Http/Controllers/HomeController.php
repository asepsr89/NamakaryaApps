<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Debitur;
use App\Models\Slik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $debitur = Debitur::count();
        $plafond = DB::table('debiturs')->sum('plafond');



        $slik = Slik::count();
        $slikapprove = Slik::where('status','2')->count();
        $slikreject = Slik::where('status','3')->count();
        $slikprogress = Debitur::where('sttsPengajuan','1')->count();


    $now = date('Y-m-d');
    $plafondSums = Cabang::select('account_officers.name','cabangs.name AS cabang', DB::raw('SUM(debiturs.plafond) as total_plafond'),
    DB::raw('COUNT(debiturs.id) as total_debitur'))
    ->join('account_officers', 'cabangs.id', '=', 'account_officers.cabang_id')
    ->join('debiturs', 'account_officers.id', '=', 'debiturs.account_id')
    ->where('debiturs.created_at', '>=', $now.' 00:00:00')
    ->where('debiturs.created_at', '<=', $now.' 23:59:59')
    ->groupBy('account_officers.name', 'cabangs.name')
    ->get();





        return view('home',compact('debitur','plafond','slik','slikapprove','slikreject','slikprogress','plafondSums'));
    }
}
