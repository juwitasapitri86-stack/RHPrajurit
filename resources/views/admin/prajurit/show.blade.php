<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Prajurit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-center mb-6 uppercase">Kutipan Riwayat Hidup</h2>

        <div class="flex">
            <!-- Biodata -->
            <div class="w-2/3">
                <table class="w-full text-left border-collapse">
                    <tr>
                        <td class="font-semibold w-40 p-1">NRP</td>
                        <td class="p-1">: {{ $prajurit->nrp }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold w-40 p-1">NRP Bayangan</td>
                        <td class="p-1">: {{ $prajurit->nrpbay }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">Nama</td>
                        <td class="p-1">: {{ $prajurit->nama }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">Pangkat</td>
                        <td class="p-1">: {{ $prajurit->pangkat ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">Korps</td>
                        <td class="p-1">: {{ $prajurit->korps ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">Masa Dinas dlm Pangkat</td>
                        <td class="p-1">: {{ $prajurit->dinpang ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">TMT TNI</td>
                        <td class="p-1">: {{ $prajurit->tmt_tni ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">TMT Fiktif</td>
                        <td class="p-1">: {{ $prajurit->tmt_fiktif ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">Masa Dinas Prajurit</td>
                        <td class="p-1">: {{ $prajurit->dinpra ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">Tempat / Tgl Lahir</td>
                        <td class="p-1">: {{ $prajurit->temphir ?? '-' }} / {{ $prajurit->tglhir ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">Jenis Kelamin</td>
                        <td class="p-1">: {{ $prajurit->jk ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">Usia</td>
                        <td class="p-1">: {{ $prajurit->usia ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">Suku</td>
                        <td class="p-1">: {{ $prajurit->suku ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">Agama</td>
                        <td class="p-1">: {{ $prajurit->agama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">Jabatan</td>
                        <td class="p-1">: {{ $prajurit->jab ?? '-' }}</td>
                    </tr>                  
                    <tr>
                        <td class="font-semibold p-1">Lama Jabatan</td>
                        <td class="p-1">: {{ $prajurit->lajab ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-1">Alamat</td>
                        <td class="p-1">: {{ $prajurit->alamat ?? '-' }}</td>
                    </tr>
                </table>
            </div>

            <!-- Foto -->
            <div class="w-1/3 flex justify-center items-start">
                @if($prajurit->foto)
                    <img src="{{ asset('storage/foto_prajurit/'.$prajurit->foto) }}"
                         alt="Foto Prajurit"
                         class="w-32 h-40 object-cover border">
                @else
                    <div class="w-32 h-40 flex items-center justify-center border bg-gray-200">
                        Tidak ada foto
                    </div>
                @endif
            </div>
        </div>

        <!-- Riwayat Pendidikan & Lainnya -->
        <div class="mt-6">
            <h3 class="font-bold">I. Pendidikan Umum</h3>
            <p>{{ $prajurit->dikum ?? '-' }}</p>

            <h3 class="font-bold mt-4">II. Pendidikan Militer</h3>
            <p>{{ $prajurit->dikmil ?? '-' }}</p>

            <h3 class="font-bold mt-4">III. Bahasa Asing</h3>
            <p>{{ $prajurit->bahasing ?? '-' }}</p>

            <h3 class="font-bold mt-4">IV. Bahasa Daerah</h3>
            <p>{{ $prajurit->bahasada ?? '-' }}</p>

            <h3 class="font-bold mt-4">V. Profesi</h3>
            <p>{{ $prajurit->profesi ?? '-' }}</p>

            <h3 class="font-bold mt-4">VI. Riwayat Pangkat</h3>
            <p>{{ $prajurit->riwpang ?? '-' }}</p>

            <h3 class="font-bold mt-4">VII. Riwayat Jabatan</h3>
            <p>{{ $prajurit->riwjab ?? '-' }}</p>

            <h3 class="font-bold mt-4">VIII. Tanda Jasa</h3>
            <p>{{ $prajurit->tanja ?? '-' }}</p>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-6 flex gap-4">
            <a href="{{ route('admin.prajurit.index') }}" 
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Kembali
            </a>
            <a href="{{ route('admin.prajurit.pdf', $prajurit->id) }}" target="_blank"
               class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Cetak PDF
            </a>
        </div>
    </div>

</body>
</html>
