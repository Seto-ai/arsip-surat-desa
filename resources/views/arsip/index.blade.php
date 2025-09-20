@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Arsip Surat</h2>
    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.
    <br>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('arsip.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari surat..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari!</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($arsip as $surat)
            <tr>
                <td>{{ $surat->nomor_surat }}</td>
                <td>{{ $surat->kategori->nama_kategori }}</td>
                <td>{{ $surat->judul }}</td>
                <td>{{ $surat->created_at->format('Y-m-d H:i:s') }}</td>
                <td class="d-flex">
                    <form action="{{ route('arsip.destroy', $surat->id) }}" method="POST" class="me-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?');">Hapus</button>
                    </form>
                    <a href="{{ route('arsip.unduh', $surat->id) }}" class="btn btn-sm btn-warning me-1">Unduh</a>
                    <a href="{{ route('arsip.show', $surat->id) }}" class="btn btn-sm btn-info">Lihat >></a>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center">Tidak ada data surat.</td></tr>
            @endforelse
        </tbody>
    </table>
    
    <a href="{{ route('arsip.create') }}" class="btn btn-success">Arsipkan Surat..</a>
</div>
@endsection