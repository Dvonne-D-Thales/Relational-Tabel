<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guardian;

class GuardianAdminController extends Controller
{
    public function index()
    {
        $guardians = Guardian::paginate(10);
        return view('admin.guardian', compact('guardians'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'job' => 'required|string|max:100',
            'phone' => 'required|string|max:20|unique:guardians,phone',
            'email' => 'required|email|max:100|unique:guardians,email',
            'address' => 'required|string|max:255',
        ], [
            'phone.unique' => 'Nomor telepon ini sudah digunakan.',
            'email.unique' => 'Email ini sudah digunakan.',
        ]);

        Guardian::create($validated);
        return redirect()->route('admin.guardians');
    }

    public function update(Request $request, $id)
    {
        $guardian = Guardian::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'job' => 'required|string|max:100',
            'phone' => 'required|string|max:20|unique:guardians,phone,' . $guardian->id,
            'email' => 'required|email|max:100|unique:guardians,email,' . $guardian->id,
            'address' => 'required|string|max:255',
        ]);

        $guardian->update($validated);
        return redirect()->route('admin.guardians.index');
    }

    public function destroy($id)
    {
        $guardian = Guardian::findOrFail($id);
        $guardian->delete();
        return redirect()->route('admin.guardians.index');
    }
}
