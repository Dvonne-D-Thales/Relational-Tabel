<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    // Tambahkan kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'name',
        'job',
        'phone',
        'email',
        'address',
    ];
}
