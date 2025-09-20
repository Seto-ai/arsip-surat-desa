@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Arsip Surat >> Lihat</h2>
    <hr>
    <p><strong>Nomor:</strong> {{ $surat->nomor_surat }}</p>
    <p><strong>Kategori:</strong> {{ $surat->kategori->nama_kategori }}</p>
    <p><strong>Judul:</strong> {{ $surat->judul }}</p>
    <p><strong>Waktu Unggah:</strong> {{ $surat->created_at->format('Y-m-d H:i:s') }}</p>

    <iframe src="{{ asset('storage/surat_pdf/' . $surat->file_pdf) }}" width="100%" height="500px"></iframe>
    <hr>

    <a href="{{ route('arsip.index') }}" class="btn btn-secondary"><< Kembali</a>
    <a href="{{ route('arsip.unduh', $surat->id) }}" class="btn btn-primary">Unduh</a>
    {{-- <a href="{{ route('arsip.edit', $surat->id) }}" class="btn btn-warning">Edit/Ganti File</a> --}}
</div>
@endsection