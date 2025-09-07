@extends('layouts.app')

@section('title', 'Edit Data Prajurit')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning">
        <h4 class="mb-0">✏️ Edit Data Prajurit</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.prajurit.update', $prajurit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nrp" class="form-label">NRP</label>
                <input type="text" name="nrp" id="nrp" class="form-control" value="{{ old('nrp', $prajurit->nrp) }}" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $prajurit->nama) }}" required>
            </div>

            <div class="mb-3">
                <label for="pangkat" class="form-label">Pangkat</label>
                <input type="text" name="pangkat" id="pangkat" class="form-control" value="{{ old('pangkat', $prajurit->pangkat) }}">
            </div>

            <div class="mb-3">
                <label for="korps" class="form-label">Korps</label>
                <input type="text" name="korps" id="korps" class="form-control" value="{{ old('korps', $prajurit->korps) }}">
            </div>

            <div class="mb-3">
                <label for="dinpang" class="form-label">Masa Dinas dlm Pangkat</label>
                <input type="text" name="dinpang" id="dinpang" class="form-control" value="{{ old('dinpang', $prajurit->dinpang) }}">
            </div>

            <div class="mb-3">
                <label for="usia" class="form-label">Usia</label>
                <input type="text" name="usia" id="usia" class="form-control" value="{{ old('usia', $prajurit->usia) }}">
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ old('jabatan', $prajurit->jabatan) }}">
            </div>

            <div class="mb-3">
                <label for="lajab" class="form-label">Lama Jabatan</label>
                <input type="text" name="lajab" id="lajab" class="form-control" value="{{ old('lajab', $prajurit->lajab) }}">
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ old('alamat', $prajurit->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="dikmil" class="form-label">Pendidikan Militer</label>
                <input type="text" name="dikmil" id="dikmil" class="form-control" value="{{ old('dikmil', $prajurit->dikmil) }}">
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto Prajurit</label><br>
                @if($prajurit->foto)
                    <img src="{{ asset('storage/foto_prajurit/'.$prajurit->foto) }}" alt="Foto Prajurit" class="img-thumbnail mb-2" width="120">
                @endif
                <input type="file" name="foto" id="foto" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.prajurit.index') }}" class="btn btn-secondary">⬅ Kembali</a>
                <button type="submit" class="btn btn-success">💾 Update Data</button>
            </div>
        </form>
    </div>
</div>
@endsection
