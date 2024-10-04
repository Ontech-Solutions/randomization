<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        
        
        'word_doc', //upload
        
    ];

    protected $cast = [
        
       'word_doc' => 'array',
        
    ];
}
