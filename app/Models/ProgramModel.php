<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramModel extends Model
{
    use HasFactory;
    protected $casts=[
        'exercises'=>'array'
    ];
   
    public function users()
    {
        return $this->belongsToMany(Usersauth::class, 'plans', 'program_id', 'user_id');
    }
}
