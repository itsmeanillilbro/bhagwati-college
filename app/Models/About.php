<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    public $table = 'about';
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
        'author',
        'status'
    ];

    protected $attributes = [
        'status' => 'draft'
    ];
}
