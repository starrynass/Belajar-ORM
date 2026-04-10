<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Karyawan') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-800 antialiased">
    <div class="container mx-auto px-4 py-6 text-slate-800 antialised">
        <div class="px-3 py-4">
        <h2 class="text-xl font-semibold">Tambah Data Karyawan</h2>
    </div>

    <div class="px-3 pb-3">
        <a href="{{ route('karyawan') }}" class="text-lg text-blue-600 font-base">Kembali</a>
    </div>

    <form action="{{ route('karyawan.create')}}" method="POST" class="mx-auto p-6">
        @csrf

        <div class="mb-5">
            <label for="nama" class="block text-sm font-medium text-slate-700 mb-2">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan nama karyawan" class="w-full px-4 py-2 border border-blue-300 rounded-md" required>
        </div>

        <div class="mb-6 mt-2">
            <label for="posisi" class="block text-sm font-medium text-slate-700 mb-2">Posisi</label>
            <input type="text" name="posisi" id="posisi" placeholder="Masukkan posisi karyawan" class="w-full px-4 py-2 border border-blue-300 rounded-md duration-200" required>
        </div>
        
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200 cursor-pointer">
            Tambah Karyawan
        </button>
    </form>
    </div>
</body>
</html>