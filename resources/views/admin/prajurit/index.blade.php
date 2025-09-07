@extends('layouts.app')

@section('title', 'Data Prajurit')

@section('content')
<div class="container">

    <!-- Judul besar + Logo di kiri -->
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Prajurit" width="60" class="me-3">
            <h2 class="fw-bold text-uppercase text-center m-0">DATA PRAJURIT</h2>
        </div>
    </div>

    <!-- Search di kanan atas tabel -->
    <div class="d-flex justify-content-end mb-3">
        <form action="{{ route('admin.prajurit.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control form-control-sm me-2"
                placeholder="Cari NRP / Nama..." value="{{ request('search') }}" style="max-width: 200px;">
            <button type="submit" class="btn btn-sm btn-primary">Cari</button>
        </form>
    </div>

    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th width="50">No</th>
                    <th>Nama</th>
                    <th>NRP</th>
                    <th>Pangkat</th>
                    <th>Jabatan</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $p)
                    <tr>
                        <td>{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->nrp }}</td>
                        <td>{{ $p->pangkat }}</td>
                        <td>{{ $p->jabatan }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.prajurit.show', $p->id) }}" class="btn btn-info btn-sm">👁 Detail</a>
                            <a href="{{ route('admin.prajurit.edit', $p->id) }}" class="btn btn-warning btn-sm">✏ Edit</a>
                            <form action="{{ route('admin.prajurit.destroy', $p->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑 Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Data prajurit tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
