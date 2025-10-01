<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
          $data = [
            'title' => 'Profil',
            'nama' => 'Sasi Kirana',
            'kelas' => 'XI PPLG 1',
            'sekolah' => 'SMK Bisa Hebat',
            'bio' => 'Siswa yang antusias terhadap pengembangan game, pemrograman, dan desain — selalu ingin belajar hal baru.',
        ];
        return view('profil', $data);
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
