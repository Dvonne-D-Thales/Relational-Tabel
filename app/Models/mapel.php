<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapels';
    protected $fillable = ['name', 'description'];

   public function teacher()
{
    return $this->hasOne(Teacher::class, 'id_mapel', );
}

}
