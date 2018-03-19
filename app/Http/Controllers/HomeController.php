<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Doctor;
use App\kamar;
use App\Pasien;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if($this->middleware('auth')){
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::all();


        $banyakPendapatan = 0;
        for($i=0; $i<sizeof($pasien); $i++){
            $banyakPendapatan+= Carbon::now()->diffInDays(new Carbon($pasien[$i]->created_at)) * $pasien[$i]->kamar['hargaPerMalam'];
        }

                
        $banyakPasien = Pasien::count();
        $banyakDokter = Doctor::count();
        return view('templates.default', compact('banyakDokter', 'banyakPendapatan', 'banyakPasien')) ;
    }

    public function chart()
    {
        $pasiens = Pasien::all();


        $banyakPendapatan = 0;
        $banyakPendapatanKemarin = 0;
        $banyakPendapatanDua = 0;
        for($i=0; $i<sizeof($pasiens); $i++){
            $banyakPendapatan+= Carbon::now()->diffInDays(new Carbon($pasiens[$i]->created_at)) * $pasiens[$i]->kamar['hargaPerMalam'];
        }
        for($i=0; $i<sizeof($pasiens); $i++){
            $banyakPendapatanKemarin+= Carbon::yesterday()->diffInDays(new Carbon($pasiens[$i]->created_at)) * $pasiens[$i]->kamar['hargaPerMalam'];
        }
        for($i=0; $i<sizeof($pasiens); $i++){
            $banyakPendapatanDua+= Carbon::yesterday()->subdays(1)->diffInDays(new Carbon($pasiens[$i]->created_at)) * $pasiens[$i]->kamar['hargaPerMalam'];
        }
        $hasil = array($banyakPendapatanDua, $banyakPendapatanKemarin, $banyakPendapatan);
        return response()->json($hasil);
    }
}
