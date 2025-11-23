<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelAdminController extends Controller
{
  public function index()
{
    $mapel = Mapel::paginate(10);
    return view('admin.mapel', compact('mapel'));
}


    public function create()
    {
        $teachers = \App\Models\Teacher::all();
        return view('admin.input.create_mapel', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
        ]);

        Mapel::create($request->all());
        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil ditambahkan.');
    }

    public function edit(Mapel $mapel)
    {
        return view('admin.update.mapel_edit', compact('mapel'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
        ]);

        $mapel->update($request->all());
        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil diperbarui.');
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil dihapus.');
    }
}
