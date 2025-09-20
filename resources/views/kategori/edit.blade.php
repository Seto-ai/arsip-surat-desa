@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kategori Surat >> Edit</h2>
    <p>Edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan".</p>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Penting untuk memberitahu Laravel ini adalah proses update --}}
        
        {{-- Memanggil file form parsial dan mengirim data kategori yang akan diedit --}}
        @include('kategori._form', ['kategori' => $kategori])
    </form>
</div>
@endsection