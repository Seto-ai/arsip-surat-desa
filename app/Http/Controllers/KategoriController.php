<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = Kategori::query();
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_kategori', 'like', "%{$request->search}%");
        }
        $kategori = $query->paginate(10);
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['nama_kategori' => 'required|string|min:3']);
        Kategori::create(['nama_kategori' => $request->nama_kategori, 'keterangan' => $request->keterangan]);
        return redirect()->route('kategori.index')->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    public function show(Kategori $kategori)
    {
        // Tidak digunakan
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $this->validate($request, ['nama_kategori' => 'required|string|min:3']);
        $kategori->update(['nama_kategori' => $request->nama_kategori, 'keterangan' => $request->keterangan]);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        if ($kategori->surat()->count() > 0) {
            return redirect()->route('kategori.index')->with('error', 'Kategori ini tidak dapat dihapus karena sedang digunakan.');
        }
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}