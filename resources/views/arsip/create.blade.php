@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Arsip Surat >> Unggah</h2>
    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
    <p>Catatan: Gunakan file berformat PDF</p>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nomor Surat</label>
            <input type="text" class="form-control" name="nomor_surat" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select class="form-select" name="kategori_id" required>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" required>
        </div>
        <div class="mb-3">
            <label class="form-label">File Surat (PDF)</label>
            <input type="file" class="form-control" name="file_pdf" required>
        </div>
        <a href="{{ route('arsip.index') }}" class="btn btn-secondary"><< Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection