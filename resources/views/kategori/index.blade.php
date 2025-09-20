@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kategori Surat</h2>
    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.
    <br>Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>

    {{-- Pesan Sukses atau Error --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    {{-- Form Pencarian --}}
    <form action="{{ route('kategori.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari kategori..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari!</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategori as $kat)
            <tr>
                <td>{{ $kat->id }}</td>
                <td>{{ $kat->nama_kategori }}</td>
                <td>{{ $kat->keterangan }}</td>
                <td class="d-flex">
                    <a href="{{ route('kategori.edit', $kat->id) }}" class="btn btn-sm btn-primary me-1">Edit</a>
                    <form onsubmit="return confirm('Apakah Anda Yakin ingin menghapus kategori ini?');" action="{{ route('kategori.destroy', $kat->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Data Kategori belum Tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <a href="{{ route('kategori.create') }}" class="btn btn-success">[+] Tambah Kategori Baru...</a>
</div>
@endsection