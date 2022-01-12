<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usersauth extends Model
{
    use HasFactory;
    public function program()
    {
        return $this->belongsToMany(ProgramModel::class, 'plans', 'user_id', 'program_id')->withPivot('completed');
    }
   
}
