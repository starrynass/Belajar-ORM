<?php

namespace App\Http\Controllers;
use App\Models\Karyawan;
use App\Models\Gaji;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
       public function index(Request $request) {

        // 🔹 Data karyawan
        $karyawan = Karyawan::all();

        // 🔹 Data gaji + relasi
        $query = Gaji::with('karyawan');

        // 🔍 Search berdasarkan nama karyawan
        if ($request->search) {
            $query->whereHas('karyawan', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        // 📄 Pagination
        $gaji = $query->paginate(5);

        // 🔥 kirim ke view (2 data)
        return view('karyawan.index', compact('karyawan', 'gaji'));
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
             'gaji_pokok' => 'required',
        'tanggal_gajian' => 'required',
        ]);

    // simpan karyawan (WAJIB pakai variabel)
    $karyawan = Karyawan::create([
        'nama' => $request->nama,
        'posisi' => $request->posisi,
    ]);

    // lalu simpan gaji (JOIN lewat karyawan_id)
    Gaji::create([
        'karyawan_id' => $karyawan->id,
        'gaji_pokok' => $request->gaji_pokok,
        'bonus' => $request->bonus ?? 0,
        'tanggal_gajian' => $request->tanggal_gajian,
    ]);

    return redirect('/karyawan');

        return redirect('/karyawan');
    }


public function update($id, Request $request) {
    $karyawan = Karyawan::findOrFail($id);

    $request->validate([
        'nama' => 'required',
        'posisi'=> 'required',
        'gaji_pokok' => 'required',
        'tanggal_gajian' => 'required',
    ]);

    // UPDATE KARYAWAN
    $karyawan->update([
        'nama' => $request->nama,
        'posisi' => $request->posisi,
    ]);

    // CARI DATA GAJI BERDASARKAN karyawan_id
    $gaji = Gaji::where('karyawan_id', $id)->first();

    if ($gaji) {
        // UPDATE GAJI
        $gaji->update([
            'gaji_pokok' => $request->gaji_pokok,
            'bonus' => $request->bonus,
            'tanggal_gajian' => $request->tanggal_gajian,
        ]);
    } else {
        // JIKA BELUM ADA → BUAT BARU
        Gaji::create([
            'karyawan_id' => $id,
            'gaji_pokok' => $request->gaji_pokok,
            'bonus' => $request->bonus,
            'tanggal_gajian' => $request->tanggal_gajian,
        ]);
    }

    return redirect('/karyawan')->with('success', 'Data berhasil diupdate');
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

        $gaji = Gaji::where('karyawan_id', $id)->first();

        return view('karyawan.edit', compact('karyawan', 'gaji'));
        }
}
