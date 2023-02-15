<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
     // un tag può essere usato in più progetti
     public function projects(){
        return $this->belongsToMany(project::class);
    }
}
