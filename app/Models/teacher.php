<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $fillable = ['name', 'id_mapel', 'phone', 'email', 'address'];

    // ✅ relasi ke tabel mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id');
    }
}
