<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [ 'title', 'description', 'programming_languages', 'frameworks', ]; 
    protected $casts = [ 'programming_languages' => 'array', 'frameworks' => 'array', ];
}
