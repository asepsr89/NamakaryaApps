<?php

namespace App\Http\Controllers;

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


        return view('home',compact('debitur','plafond','slik','slikapprove','slikreject','slikprogress'));
    }
}
