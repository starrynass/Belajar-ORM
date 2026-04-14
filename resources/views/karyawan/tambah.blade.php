<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Karyawan') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-900 relative overflow-x-hidden text-gray-200">

<!-- Gradient kiri atas -->
<div class="absolute top-0 left-0 w-[400px] h-[400px] 
bg-gradient-to-br from-gray-500/10 to-transparent 
blur-3xl rounded-full"></div>

<!-- Gradient kanan bawah -->
<div class="absolute bottom-0 right-0 w-[400px] h-[400px] 
bg-gradient-to-tl from-gray-500/10 to-transparent 
blur-3xl rounded-full"></div>

<div class="max-w-3xl mx-auto py-10 relative z-10">

    <!-- HEADER -->
    <div class="bg-gray-200/80 backdrop-blur 
        shadow-[0_6px_25px_rgba(200,200,200,0.15)] 
        rounded-2xl p-6 mb-6">
        <h2 class="text-xl font-semibold text-gray-800">
            Tambah Data Karyawan
        </h2>
    </div>

    <!-- BACK BUTTON -->
    <div class="mb-4">
        <a href="{{ route('karyawan') }}" 
           class="text-gray-300 hover:text-white transition">
            ← Kembali
        </a>
    </div>

    <!-- FORM -->
    <form action="{{ route('karyawan.create')}}" method="POST" 
        class="bg-gray-200/80 backdrop-blur 
        shadow-[0_8px_30px_rgba(200,200,200,0.15)] 
        rounded-2xl p-6 space-y-5">
        @csrf

        <!-- NAMA -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
            <input type="text" name="nama" placeholder="Masukkan nama karyawan"
                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-300 
                focus:ring-2 focus:ring-gray-400 outline-none text-gray-700">
        </div>

        <!-- POSISI -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Posisi</label>
            <input type="text" name="posisi" placeholder="Masukkan posisi karyawan"
                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-300 
                focus:ring-2 focus:ring-gray-400 outline-none text-gray-700">
        </div>

        <!-- GAJI POKOK -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Gaji Pokok</label>
            <input type="number" name="gaji_pokok"
                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-300 
                focus:ring-2 focus:ring-gray-400 outline-none text-gray-700">
        </div>

        <!-- BONUS -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Bonus</label>
            <input type="number" name="bonus"
                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-300 
                focus:ring-2 focus:ring-gray-400 outline-none text-gray-700">
        </div>

        <!-- TANGGAL -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Gajian</label>
            <input type="date" name="tanggal_gajian"
                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-300 
                focus:ring-2 focus:ring-gray-400 outline-none text-gray-700">
        </div>

        <!-- BUTTON -->
       <button type="submit" 
        onclick="this.disabled=true; this.innerText='Loading...'; this.form.submit();"
        class="w-full bg-gray-700 hover:bg-gray-800 text-white py-2 rounded-lg">
        Tambah Karyawan
        </button>
    </form>

</div>

</body>
</html>