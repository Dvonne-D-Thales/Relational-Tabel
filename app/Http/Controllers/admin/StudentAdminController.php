<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Classroom;

class StudentAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $students = Students::with('classroom')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('classroom', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    });
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();


        $classrooms = Classroom::orderBy('name')->get();

        return view('admin.student', compact('students', 'classrooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email',
            'classroom_id' => 'required|exists:classrooms,id',
            'address' => 'required|string|max:255',
            'birthday' => 'required|date',
        ]);

        Students::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'classroom_id' => $validated['classroom_id'],
            'birthdate' => $validated['birthday'],
            'address' => $validated['address'],
        ]);

        return redirect()->route('admin.students.index');
    }

    public function edit($id)
    {
        $student = Students::findOrFail($id);
        $classrooms = Classroom::all();

        return view('admin.update.student_edit', compact('student', 'classrooms'));
    }

    public function update(Request $request, $id)
    {
        $student = Students::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'classroom_id' => 'required|exists:classrooms,id',
            'address' => 'required|string|max:255',
            'birthday' => 'required|date',
        ]);

        $student->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'classroom_id' => $validated['classroom_id'],
            'birthdate' => $validated['birthday'],
            'address' => $validated['address'],
        ]);

        return redirect()->route('admin.students.index');
    }

    public function destroy($id)
    {
        Students::findOrFail($id)->delete();
        return back();
    }
}
