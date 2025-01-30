<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tempat' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $photoPath = $request->file('photo')->store('uploads/berita', 'public');

        Berita::create([
            'photo' => $photoPath,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tempat' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($berita->photo);
            $photoPath = $request->file('photo')->store('uploads/berita', 'public');
            $berita->photo = $photoPath;
        }

        $berita->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        Storage::disk('public')->delete($berita->photo);
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
