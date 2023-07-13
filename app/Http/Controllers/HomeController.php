<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Debitur;
use App\Models\Fasilitas;
use App\Models\Slik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\ErrorHandler\Debug;

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
        $userid = auth()->user()->cabang_id;
        $mitra_id = auth()->user()->mitra_id;

        if (auth()->user()->cabang_id == null) {
            $debitur = Debitur::count();
            $plafond = Debitur::whereIN('sttsPengajuan', [0, 1, 5, 8])->sum('plafond');
            $pencairan = Fasilitas::where('status', '8')->sum('PlafondRekomen');
            $pending = Debitur::whereNotIn('sttsPengajuan', [0, 8])->sum('plafond');

            // return view('home', compact('debitur', 'plafond', 'slik', 'slikapprove', 'slikreject', 'slikprogress', 'plafondSums', 'pencapaian', 'pencairan', 'pending', 'disb'));

            if ($mitra_id >= 1) {
                $plafond = Debitur::select('Debiturs')
                    ->whereIN('sttsPengajuan', [0, 1, 5, 8])
                    ->where('mitra_id', $mitra_id)
                    ->sum('plafond');

                // dd($plafond);
                $debitur = Debitur::select('Debiturs')
                    ->where('mitra_id', $mitra_id)
                    ->count();

                $pencairan = Fasilitas::select('fasilitas')
                    ->whereIN('status', [8])
                    ->where('mitra_id', $mitra_id)
                    ->sum('PlafondRekomen');

                $pending = Debitur::select('Debiturs')
                    ->whereNotIn('sttsPengajuan', [0, 8])
                    ->where('mitra_id', $mitra_id)
                    ->sum('plafond');
            }
        } else {
            $plafond = Debitur::select('Debiturs')
                ->whereIN('sttsPengajuan', [0, 1, 5, 8])
                ->where('cabang_id', $userid)
                ->sum('plafond');

            // dd($plafond);
            $debitur = Debitur::select('Debiturs')
                ->where('cabang_id', $userid)
                ->count();

            $pencairan = Fasilitas::select('fasilitas')
                ->whereIN('status', [8])
                ->where('cabang_id', $userid)
                ->sum('PlafondRekomen');

            $pending = Debitur::select('Debiturs')
                ->whereNotIn('sttsPengajuan', [0, 8])
                ->where('cabang_id', $userid)
                ->sum('plafond');
        }



        $slik = Slik::count();
        $slikapprove = Slik::where('status', '2')->count();
        $slikreject = Slik::where('status', '3')->count();
        $slikprogress = Debitur::where('sttsPengajuan', '1')->count();





        $plafondSums = Cabang::select(
            'account_officers.name',
            'cabangs.name AS cabang',
            DB::raw('SUM(debiturs.plafond) as total_plafond'),
            DB::raw('COUNT(debiturs.id) as total_debitur')
        )
            ->join('account_officers', 'cabangs.id', '=', 'account_officers.cabang_id')
            ->join('debiturs', 'account_officers.id', '=', 'debiturs.accountOfficer_id')
            ->where("tglPengajuan", ">", \Carbon\Carbon::now()->subMonths(1))
            ->groupBy('account_officers.name', 'cabangs.name')
            ->get();

        // dd($plafondSums);

        $pencapaian = Cabang::select(
            'account_officers.name',
            'cabangs.name AS cabang',
            DB::raw('SUM(debiturs.plafond) as total_plafond'),
            DB::raw('COUNT(debiturs.id) as total_debitur')
        )
            ->join('account_officers', 'cabangs.id', '=', 'account_officers.cabang_id')
            ->join('debiturs', 'account_officers.id', '=', 'debiturs.accountOfficer_id')
            ->where('debiturs.sttsPengajuan', 8)
            ->groupBy('account_officers.name', 'cabangs.name')
            ->get();

        $disb = Cabang::select(
            'account_officers.spv',
            'cabangs.name AS cabang',
            DB::raw('SUM(debiturs.plafond) as total_plafond'),
            DB::raw('COUNT(debiturs.id) as total_debitur')
        )
            ->join('account_officers', 'cabangs.id', '=', 'account_officers.cabang_id')
            ->join('debiturs', 'account_officers.id', '=', 'debiturs.accountOfficer_id')
            ->where('debiturs.sttsPengajuan', 8)
            ->where("tglPengajuan", ">", \Carbon\Carbon::now()->subMonths(2))
            ->groupBy('account_officers.spv', 'cabangs.name')
            ->get();





        return view('home', compact('debitur', 'plafond', 'slik', 'slikapprove', 'slikreject', 'slikprogress', 'plafondSums', 'pencapaian', 'pencairan', 'pending', 'disb'));
    }
}
