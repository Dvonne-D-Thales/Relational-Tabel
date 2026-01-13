<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomAdminController extends Controller
{
    /**
     * Tampilkan daftar kelas.
     */
    public function index(Request $request)
    {
         $search = $request->search;

        $classrooms = Classroom::with('students')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', $search . '%');
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('admin.classroom', [
            'title' => 'Classroom',
            'classrooms' => $classrooms
        ]);
    }

    /**
     * Simpan data kelas baru.
     */
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // cek apakah nama sudah ada
    if (Classroom::where('name', $request->name)->exists()) {
        return redirect()->back();
    }

    Classroom::create([
        'name' => $request->name,
    ]);

    return redirect()->back();
}

    /**
     * Tampilkan form edit.
     */
    public function edit($id)
{
    $classroom = Classroom::findOrFail($id);
    return view('admin.update.classroom_edit', compact('classroom'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    if (Classroom::where('name', $request->name)
                 ->where('id', '!=', $id)
                 ->exists()) {
        return redirect()->back();
    }

    $classroom = Classroom::findOrFail($id);
    $classroom->update([
        'name' => $request->name,
    ]);

    return redirect()->route('admin.classrooms.index');
}

}
