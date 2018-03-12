<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Doctor;
use App\Spesialis;

class addDokter extends Controller
{
    public function index()
    {
        $dokters = Doctor::all();
        $spesialis = DB::table('spesialiss')->get();
        return view('templates.tampilanDokter', compact('dokters', 'spesialis'));
    }
    public function store()
    {
        Doctor::create([
            'nama_dokter' => request('nama_dokter'),
            'spesialis' => request('spesialis'),
            'noHp' => request('noHp'),
            'email' => request('email')
        ]);
        return redirect('\tambahDokter')->with(['success' => 'Tambah Dokter Berhasil']);
    }

    public function spesialis()
    {
       $spesialis = DB::table('spesialiss')->get();
       return view('templates.tambahDokter', compact('spesialis'));
    }

    public function deleteItem(Request $req)
    {
        Doctor::find($req->id)->delete();
        return redirect('\tampilanDokter') -> with(['success' => 'Hapus Dokter Berhasil']);
    }

    public function redirection()
    {
        return redirect('\tampilanDokter') -> with(['success' => 'Hapus Dokter Berhasil']);
    }

    public function redirections()
    {
        return redirect('\tampilanDokter') -> with(['success' => 'Edit Dokter Berhasil']);
    }

    public function update(Request $req)
    {
        $dokters = Doctor::find($req->id);

        $dokters->nama_dokter = $req->nama_dokter;
        $dokters->spesialis = $req->spesialis;
        $dokters->noHp = $req->noHp;
        $dokters->email = $req->email;
        $dokters->save();

        return response ()->json ( $dokters );
    }
        
}
