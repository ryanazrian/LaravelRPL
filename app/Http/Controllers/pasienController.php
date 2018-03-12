<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\gedung;
use App\Doctor;
use App\kamar;
use App\Pasien;


class pasienController extends Controller
{
    public function index()
    {
        $gedung = gedung::all();
        $dokters = Doctor::all();
        return view('templates.tambahPasien', compact('gedung', 'dokters'));
    }

    public function tampilanPasien()
    {
        // $pasiens = Pasien::all();
        // $kamar = kamar::all();
        // $gedung = gedung::all();
        $pasiens = DB::table('pasiens')
            ->leftJoin('gedungs', 'pasiens.id_Gedung', '=', 'gedungs.id')
            ->leftJoin('kamars', 'pasiens.id_kamar', '=', 'kamars.id')
            ->leftJoin('doctors', 'pasiens.id_Dokter', '=', 'doctors.id')
            ->get();
        return view('templates.tampilanPasien', compact('pasiens'));
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

    public function deleteItem(Request $req)
    {
        Pasien::find($req->id)->delete();
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
