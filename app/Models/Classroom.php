<?php
namespace App\Models;
// /php artisan make:model Product -mfs
//php artisan make:controller GuardianController --resource --model=Guardian

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;

class Classroom extends Model
{
    use HasFactory;

    protected $table = 'classrooms';

    protected $fillable = ['name'];

    public function students()
    {
        return $this->hasMany(Students::class, 'classroom_id');
    }
}
