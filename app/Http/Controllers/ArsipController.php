<?php
namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $query = Surat::with('kategori');
        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'LIKE', '%' . $request->search . '%');
        }
        $arsip = $query->latest()->paginate(10);
        return view('arsip.index', compact('arsip'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('arsip.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'file_pdf' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file_pdf');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/surat_pdf', $fileName);

        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'file_pdf' => $fileName,
        ]);

        return redirect()->route('arsip.index')->with('success', 'Surat berhasil diarsipkan!');
    }

    public function show(Surat $arsip)
    {
        return view('arsip.show', ['surat' => $arsip]);
    }

    public function edit(Surat $arsip)
    {
        // Fitur edit tidak diminta, tapi ini kerangkanya jika diperlukan
        $kategori = Kategori::all();
        return view('arsip.edit', compact('arsip', 'kategori'));
    }

    public function update(Request $request, Surat $arsip)
    {
        // Logika untuk update
    }

    public function destroy(Surat $arsip)
    {
        Storage::delete('public/surat_pdf/' . $arsip->file_pdf);
        $arsip->delete();
        return redirect()->route('arsip.index')->with('success', 'Arsip surat berhasil dihapus!');
    }

    public function unduh(Surat $surat)
    {
        return Storage::download('public/surat_pdf/' . $surat->file_pdf);
    }
}