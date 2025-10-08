<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
   use HasFactory;

    protected $table = 'students';
    protected $fillable = ['name', 'id_classroom', 'age', 'address', 'phone', 'email'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'id_classroom');
    }

}
