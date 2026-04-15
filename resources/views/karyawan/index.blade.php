<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan & Gaji</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-900 relative overflow-hidden">

<div class="absolute top-0 left-0 w-[400px] h-[400px] 
bg-gradient-to-br from-gray-500/10 to-transparent 
blur-3xl rounded-full"></div>

<div class="absolute bottom-0 right-0 w-[400px] h-[400px] 
bg-gradient-to-tl from-gray-500/10 to-transparent 
blur-3xl rounded-full"></div>

<div class="max-w-6xl mx-auto py-8 relative z-10">

    <div class="bg-gray-200/80 backdrop-blur 
        shadow-[0_6px_25px_rgba(200,200,200,0.15)] 
        rounded-2xl p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Data Karyawan & Gaji
        </h2>
    </div>

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('karyawan.tambah') }}" 
           class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded-lg 
           shadow-[0_4px_10px_rgba(200,200,200,0.2)] transition">
            + Tambah Karyawan
        </a>

        <form method="GET" class="flex gap-2">
            <input type="text" name="search" placeholder="Cari nama..."
                class="border border-gray-300 px-3 py-2 rounded-lg 
                focus:ring-2 focus:ring-gray-400 outline-none bg-gray-100 text-gray-700">
            <button class="bg-gray-700 text-white px-4 py-2 rounded-lg 
                hover:bg-gray-800 shadow-[0_4px_10px_rgba(200,200,200,0.2)] transition">
                Search
            </button>
        </form>
    </div>

 <div class="bg-gray-200/80 backdrop-blur 
    shadow-[0_15px_50px_rgba(180,180,180,0.25),_0_5px_20px_rgba(200,200,200,0.2)] 
    rounded-2xl overflow-hidden transition">

        <table class="w-full text-sm">
            <thead class="bg-gray-700 text-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Nama</th>
                    <th class="px-6 py-3 text-left">Posisi</th>
                    <th class="px-6 py-3 text-left">Gaji Pokok</th>
                    <th class="px-6 py-3 text-left">Bonus</th>
                    <th class="px-6 py-3 text-left">Total</th>
                    <th class="px-6 py-3 text-left">Tanggal</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-300">
                @foreach ($gaji as $d)
                <tr class="hover:bg-gray-300/40 transition">
                    <td class="px-6 py-4 font-semibold text-gray-700">{{ $d->id }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $d->karyawan->nama }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $d->karyawan->posisi }}</td>
                    <td class="px-6 py-4 text-gray-700">Rp {{ number_format($d->gaji_pokok) }}</td>
                    <td class="px-6 py-4 text-gray-700">Rp {{ number_format($d->bonus) }}</td>

                    <td class="px-6 py-4 font-bold text-gray-900">
                        Rp {{ number_format($d->gaji_pokok + $d->bonus) }}
                    </td>

                    <td class="px-6 py-4 text-gray-600">{{ $d->tanggal_gajian }}</td>

                    <td class="px-6 py-4 flex gap-3">

                        <a href="/karyawan/{{ $d->karyawan->id }}" 
                           class="text-gray-700 hover:text-black font-medium transition">
                            Edit
                        </a>

                        <form action="{{ route('karyawan.delete', ['id' => $d->karyawan->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-gray-500 hover:text-black font-medium transition">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 text-gray-200">
        {{ $gaji->links() }}
    </div>

</div>

</body>
</html>