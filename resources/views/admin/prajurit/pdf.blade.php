<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Biodata Prajurit</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .judul { text-align: center; font-weight: bold; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 3px; vertical-align: top; }
        .label { width: 200px; font-weight: bold; }
        .foto { text-align: center; }
        .foto img { width: 100px; height: 130px; object-fit: cover; } /* 3x4 ukuran pas */
    </style>
</head>
<body>
    <div class="judul">KUTIPAN RIWAYAT HIDUP</div>

    <table>
        <tr>
            <td class="label">NRP</td>
            <td>: {{ $prajurit->nrp }}</td>
            <td rowspan="6" class="foto">
                @if($fotoBase64)
                    <img src="{{ $fotoBase64 }}">
                @endif
            </td>
        </tr>
        <tr>
            <td class="label">NRP BAYANGAN</td>
            <td>: {{ $prajurit->nrpbay ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">NAMA</td>
            <td>: {{ strtoupper($prajurit->nama) }}</td>
        </tr>
        <tr>
            <td class="label">PANGKAT</td>
            <td>: {{ $prajurit->pangkat }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>KORPS</b> : {{ $prajurit->korps ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">MASA DINAS DLM PANGKAT</td>
            <td>: {{ $prajurit->dinpang ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">TMT TNI</td>
            <td>: {{ $prajurit->tmt_tni ?? '-' }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>TMT FIKTIF</b> : {{ $prajurit->tmt_fiktif ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">MASA DINAS PRAJURIT</td>
            <td colspan="2">: {{ $prajurit->dinpra?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">TEMPAT / TGL LAHIR</td>
            <td colspan="2">: {{ $prajurit->temhir }}, {{ $prajurit->tglhir }}</td>
        </tr>
        <tr>
            <td class="label">USIA</td>
            <td colspan="2">: {{ $prajurit->usia ?? '-' }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>JENIS KELAMIN</b> : {{ $prajurit->jk ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">SUKU</td>
            <td colspan="2">: {{ $prajurit->suku ?? '-' }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>AGAMA</b> : {{ $prajurit->agama ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">JABATAN</td>
            <td colspan="2">: {{ $prajurit->jab }}</td>
        </tr>
        <tr>
            <td class="label">LAMA JABATAN</td>
            <td colspan="2">: {{ $prajurit->lajab ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">ALAMAT</td>
            <td colspan="2">: {{ $prajurit->alamat }}</td>
        </tr>
    </table>

    <br><br>

    <b>I. PENDIDIKAN UMUM</b><br>
    {!! nl2br(e($prajurit->dikum)) !!}<br><br>

    <b>II. PENDIDIKAN MILITER</b><br>
    {!! nl2br(e($prajurit->dikmil)) !!}<br><br>

    <b>III. BAHASA ASING</b><br>
    {{ $prajurit->bahasing ?? '-' }}<br><br>

    <b>IV. BAHASA DAERAH</b><br>
    {{ $prajurit->bahasada ?? '-' }}<br><br>

    <b>V. PROFESI</b><br>
    {{ $prajurit->profesi ?? '-' }}

    <b>VI. RIWAYAT PANGKAT</b><br>
    {{ $prajurit->riwpang ?? '-' }}

    <b>VII. RIWAYAT JABATAN</b><br>
    {{ $prajurit->riwjab ?? '-' }}

    <b>VIII. TANDA JASA</b><br>
    {{ $prajurit->tanja ?? '-' }}
</body>
</html>
