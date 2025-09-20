{{-- Menampilkan ID hanya saat mode edit --}}
@isset($kategori)
    <div class="mb-3">
        <label class="form-label">ID Kategori (Auto Increment)</label>
        <input type="text" class="form-control" value="{{ $kategori->id }}" disabled>
        {{-- 'disabled' berarti tidak bisa diubah dan tidak akan dikirim saat submit --}}
    </div>
@endisset

<div class="mb-3">
    <label for="nama_kategori" class="form-label">Nama Kategori</label>
    {{-- Mengisi value jika ada data $kategori, jika tidak, kosongkan --}}
    <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" 
           value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <textarea id="keterangan" name="keterangan" class="form-control" rows="4">{{ old('keterangan', $kategori->keterangan ?? '') }}</textarea>
</div>

{{-- Tombol Aksi --}}
<a href="{{ route('kategori.index') }}" class="btn btn-secondary"><< Kembali</a>
<button type="submit" class="btn btn-primary">Simpan</button>