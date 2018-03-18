<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\gedung;
use App\Doctor;
use App\kamar;
use App\Pasien;
use Carbon\Carbon;

class pasienController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $gedung = gedung::all();
        $dokters = Doctor::all();
        return view('templates.tambahPasien', compact('gedung', 'dokters'));
    }

    public function tampilanPasien()
    {
        $pasiens = Pasien::all();
        // $kamar = kamar::all();
        // $gedung = gedung::all();
        // $pasiens = DB::table('pasiens')
        //     ->join('gedungs', 'pasiens.id_Gedung', '=', 'gedungs.id')
        //     ->join('kamars', 'pasiens.id_kamar', '=', 'kamars.id')
        //     ->Join('doctors', 'pasiens.id_Dokter', '=', 'doctors.id')
        //     ->get();
        $dokter = Doctor::all();
        $gedung = gedung::all();

    
        // $dtToronto = new Carbon ($dokter[1]->created_at);
        // $dtVancouver = Carbon::now();

        // $beda =  $dtVancouver->diffInDays($dtToronto);
        return view('templates.tampilanPasien', compact('pasiens', 'dokter', 'gedung', 'beda'));
    }

    public function dropDown($id)
    {
        $kamars = DB::table('kamars')->where('gedung_id', $id)->get();
        return JSON_decode($kamars);
    }

    public function store()
    {
        Pasien::create([
            'nama' => request('nama'),
            'noHp' => request('noHp'),
            'tanggalLahir' => request('tanggalLahir'),
            'deskripsiPenyakit' => request('deskripsiPenyakit'),
            'id_Gedung' => request('id_Gedung'),
            'id_kamar' => request('id_kamar'),
            'id_Dokter' => request('id_Dokter'),
        ]);
        return redirect('\tambahPasien')->with(['success' => 'Tambah Pasien Berhasil']);
    }

    public function editPasien(Request $req)
    {
        Pasien::where('ids', $req->ids)->update([
            'nama'=>$req->nama, 
            'tanggalLahir'=>$req->tanggalLahir,
            'id_Gedung'=>$req->id_Gedung,
            'id_kamar'=>$req->id_kamar,
            'deskripsiPenyakit'=>$req->deskripsiPenyakit,
            'id_Dokter'=>$req->id_Dokter,
            'noHp'=>$req->noHp
            ]);
        // $pasien->nama = $req->nama;
        // $pasien->tanggalLahir = $req->tanggalLahir;
        // $pasien->id_Gedung = $req->id_Gedung;
        // $pasien->id_kamar = $req->id_kamar;
        // $pasien->deskripsiPenyakit = $req->deskripsiPenyakit;
        // $pasien->id_Dokter = $req->id_Dokter;
        // $pasien->noHp = $req->noHp;
        // $pasien->save();

        // return response ()->json ( $pasien );
    }

    public function deleteItem(Request $req)
    {
        Pasien::where('ids', $req->id)->delete();
        return redirect('\tampilanPasien') -> with(['success' => 'Hapus Pasien Berhasil']);
    }

    public function redirection()
    {
        return redirect('\tampilanPasien') -> with(['success' => 'Hapus Pasien Berhasil']);
    }

    public function redirections()
    {
        return redirect('\tampilanPasien') -> with(['success' => 'Edit Pasien Berhasil']);
    }


}
