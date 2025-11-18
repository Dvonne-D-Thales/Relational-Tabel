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
    public function index()
    {
        $classrooms = Classroom::withCount('students')->paginate(10);
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
            'name' => 'required|string|max:255|unique:classrooms,name',
        ]);

        Classroom::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Kelas berhasil ditambahkan!');
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
        'name' => 'required|max:255'
    ]);

    $classroom = Classroom::findOrFail($id);

    $classroom->update([
        'name' => $request->name,
    ]);

    return redirect()->route('admin.classrooms.index')
                     ->with('success', 'Kelas berhasil diperbarui!');
}


    /**
     * Hapus kelas.
     */
    public function destroy($id)
    {
        Classroom::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Kelas berhasil dihapus!');
    }
}
