<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Mapel;
use Illuminate\Http\Request;

class TeacherAdminController extends Controller
{
    // 🔹 READ
    public function index()
    {
        $teachers = Teacher::with('mapel')->paginate(10);
        $mapels = Mapel::all();

        return view('admin.teacher', compact('teachers', 'mapels'));
    }

    // 🔹 STORE
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'id_mapel' => 'required|exists:mapels,id',
            'phone'    => 'nullable|string|max:20|unique:teachers,phone',
            'email'    => 'nullable|email|max:100|unique:teachers,email',
            'address'  => 'nullable|string|max:255',
        ]);

        Teacher::create($request->all());
        return redirect()->route('admin.teachers.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    // 🔹 EDIT
    public function edit(Teacher $teacher)
    {
        $mapels = Mapel::all();
        return view('admin.update.teacher_edit', compact('teacher', 'mapels'));
    }

    // 🔹 UPDATE
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'id_mapel' => 'required|exists:mapels,id',
            'phone'    => 'nullable|string|max:20|unique:teachers,phone,' . $teacher->id,
            'email'    => 'nullable|email|max:100|unique:teachers,email,' . $teacher->id,
            'address'  => 'nullable|string|max:255',
        ]);

        $teacher->update($request->all());
        return redirect()->route('admin.teachers.index')->with('success', 'Data guru berhasil diupdate');
    }

    // 🔹 DELETE
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'Guru berhasil dihapus');
    }
}
