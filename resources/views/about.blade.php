@extends('layouts.app')

@section('content')
<div class="container">
    <h2>About</h2>
    <hr>

    <div style="display: flex; align-items: center; gap: 20px;">
        
        <div>
            <img src="{{ asset('images/fotoku.jpeg') }}" 
                 alt="Foto Profil" 
                 style="width: 150px; height: 180px; border: 3px solid #333; object-fit: cover; border-radius: 5px;">
        </div>
        
        <div>
            <p><strong>Aplikasi ini dibuat oleh:</strong></p>
            <table>
                <tr>
                    <td style="padding-right: 10px;"><strong>Nama</strong></td>
                    <td>: DIMAS SETO NUGROHO</td>
                </tr>
                <tr>
                    <td><strong>Prodi</strong></td>
                    <td>: MANAJEMEN INFORMATIKA</td>
                </tr>
                <tr>
                    <td><strong>NIM</strong></td>
                    <td>: 2331730023</td>
                </tr>
                <tr>
                    <td><strong>Tanggal</strong></td>
                    <td>:16 September 2025</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection