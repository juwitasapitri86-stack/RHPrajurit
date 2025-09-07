<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Biodata Prajurit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Form Biodata Prajurit</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!-- Data Dasar -->
        <div>
            <label class="block font-semibold">NRP</label>
            <input type="text" name="nrp" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">NRP BAYANGAN</label>
            <input type="text" name="nrpbay" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">NAMA</label>
            <input type="text" name="nama" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">PANGKAT</label>
            <input type="text" name="pangkat" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">KORPS</label>
            <input type="text" name="korps" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">MASA DINAS DLM PANGKAT</label>
            <input type="text" name="dinpang" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">TMT TNI</label>
            <input type="text" name="tmt_tni" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">TMT FIKTIF</label>
            <input type="text" name="tmt_fiktif" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">MASA DINAS PRAJURIT</label>
            <input type="text" name="dinpra" class="w-full border p-2 rounded">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">TEMPAT LAHIR</label>
                <input type="text" name="temhir" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-semibold">TANGGAL LAHIR</label>
                <input type="date" name="tglhir" class="w-full border p-2 rounded">
            </div>
        </div>

        <div>
            <label class="block font-semibold">JENIS KELAMIN</label>
            <input type="text" name="jk" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">USIA</label>
            <input type="text" name="usia" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">SUKU</label>
            <input type="text" name="suku" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">AGAMA</label>
            <input type="text" name="agama" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">JABATAN</label>
            <input type="text" name="jab" class="w-full border p-2 rounded">
        </div>
        
        <div>
            <label class="block font-semibold">LAMA JABATAN</label>
            <input type="text" name="lajab" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">ALAMAT</label>
            <textarea name="alamat" class="w-full border p-2 rounded"></textarea>
        </div>

        <!-- Riwayat Pendidikan -->
        <div>
            <label class="block font-semibold">PENDIDIKAN UMUM</label>
            <textarea name="dikum" class="w-full border p-2 rounded"></textarea>
        </div>

        <div>
            <label class="block font-semibold">PENDIDIKAN MILITER</label>
            <textarea name="dikmil" class="w-full border p-2 rounded"></textarea>
        </div>

        <div>
            <label class="block font-semibold">BAHASA ASING</label>
            <input type="text" name="bahasing" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">BAHASA DAERAH</label>
            <input type="text" name="bahasada" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">PROFESI</label>
            <input type="text" name="profesi" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">RIWAYAT PANGKAT</label>
            <input type="text" name="riwpang" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">RIWAYAT JABATAN</label>
            <input type="text" name="riwjab" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">TANDA JASA</label>
            <input type="text" name="tanja" class="w-full border p-2 rounded">
        </div>

        <!-- Upload Foto -->
        <div>
            <label class="block font-semibold">Upload Foto</label>
            <input type="file" name="foto" class="w-full border p-2 rounded">
        </div>

        <!-- Tombol Submit -->
        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Simpan Data
            </button>
        </div>
    </form>
</div>

</body>
</html>
