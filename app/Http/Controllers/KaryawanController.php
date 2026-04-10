<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index() {
        $karyawan = Karyawan::all();
        return view ('karyawan.index', ['karyawan' => $karyawan]);
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
        ]);

        karyawan::create([
            'nama' => $validatedData['nama'],
            'posisi' => $validatedData['posisi'],
        ]);

        return redirect('/karyawan');
    }

    public function update($id, Request $request) {
        $karyawan = karyawan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'posisi'=> 'required',
        ]);

        $karyawan->update([
            'nama' => $request->nama,
            'posisi' => $request->posisi,
        ]);

        return redirect('/karyawan');
    }

    public function destroy($id) {
        $karyawan = karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect('/karyawan');
    }

    public function show(){
       return view('karyawan.tambah');
    }

    public function edit($id) {
        $karyawan = karyawan::findOrFail($id);
        return view('karyawan.edit', ['karyawan' => $karyawan]);
    }
}
