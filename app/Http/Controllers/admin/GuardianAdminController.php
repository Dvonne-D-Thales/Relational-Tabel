<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guardian;

class GuardianAdminController extends Controller
{
   public function index(Request $request)
{
    $search = $request->search;

    $guardians = Guardian::when($search, function ($query, $search) {
            $query->where('name', 'like', $search.'%');
        })
        ->orderBy('name')
        ->paginate(10)
        ->withQueryString();

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

    public function edit($id)
    {
        $guardian = Guardian::findOrFail($id);
        return view('admin.update.guardian_edit', compact('guardian'));
    }

    public function update(Request $request, Guardian $guardian)
    {
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

    public function destroy(Guardian $guardian)
    {
        $guardian->delete();
        return redirect()->route('admin.guardians.index');
    }
}
