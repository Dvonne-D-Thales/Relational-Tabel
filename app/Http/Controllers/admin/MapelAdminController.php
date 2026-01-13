<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelAdminController extends Controller
{
 public function index(Request $request)
{
    $search = $request->search;

    $mapel = Mapel::with('teacher')
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', $search.'%');
        })
        ->orderBy('name')
        ->paginate(10)
        ->withQueryString();

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
        return redirect()->route('admin.mapel.index');
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

}
