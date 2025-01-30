<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KadesController extends Controller
{
    public function index()
    {
        $kades = Kades::all();
        return view('admin.kades.index', compact('kades'));
    }

    public function create()
    {
        return view('admin.kades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:1024',
            'tahun_jabatan' => 'required|string'
        ]);

        $photoPath = $request->file('photo')->store('uploads/kades', 'public');

        Kades::create([
            'name' => $request->name,
            'photo_url' => $photoPath,
            'tahun_jabatan' => $request->tahun_jabatan
        ]);

        return redirect()->route('admin.kades.index')->with('success', 'Kades added successfully.');
    }

    public function edit($id)
    {
        $kades = Kades::findOrFail($id);
        return view('admin.kades.edit', compact('kades'));
    }

    public function update(Request $request, $id)
    {
        $kades = Kades::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'tahun_jabatan' => 'required|string'
        ]);

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($kades->photo_url);
            $photoPath = $request->file('photo')->store('uploads/kades', 'public');
            $kades->photo_url = $photoPath;
        }

        $kades->update([
            'name' => $request->name,
            'tahun_jabatan' => $request->tahun_jabatan,
            'photo_url' => $kades->photo_url
        ]);

        return redirect()->route('admin.kades.index')->with('success', 'Kades updated successfully.');
    }


    public function destroy($id)
    {
        $kades = Kades::findOrFail($id);
        Storage::disk('public')->delete($kades->photo_url);
        $kades->delete();

        return redirect()->route('admin.kades.index')->with('success', 'Kades deleted successfully.');
    }
}
