<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
      protected $fillable = 
   ["name","description","cover_img"]
      ;

      
    // un post può avere molte tecnologie
    public function technologies() {
      return $this->belongsToMany(Technology::class);
  }
}
