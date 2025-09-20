@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kategori Surat >> Tambah</h2>
    <p>Tambahkan data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan".</p>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        {{-- Memanggil file form parsial --}}
        @include('kategori._form')
    </form>
</div>
@endsection