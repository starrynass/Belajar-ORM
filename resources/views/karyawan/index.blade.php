<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Karyawan') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-800 antialiased">
    <div class="px-3 py-4">
        <h2 class="text-xl font-semibold">Data Karyawan</h2>
    </div>

    <table class="mx-3 divide-y divide-slate-200 text-sm">
        <thead class="bg-slate-50">
            <tr>
                <th class="px-6 py-3 text-left font-medium text-slate-600">ID</th>
                <th class="px-6 py-3 text-left font-medium text-slate-600">Nama</th>
                <th class="px-6 py-3 text-left font-medium text-slate-600">Posisi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 bg-white">
            @foreach ($karyawan as $p)
                <tr class="hover:bg-slate-50">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $p->id }}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ $p->nama }}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ $p->posisi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>