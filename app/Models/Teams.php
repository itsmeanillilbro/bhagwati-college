<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;
    public $table = 'teams';
    protected $fillable = [
        'id',
        'title',
        'designation',
        'image',
        'author',
        'status',
        'facebook',
        'instagram'
    ];
}
