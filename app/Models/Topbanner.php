<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topbanner extends Model
{
    use HasFactory;

    public $table = 'topbanner';
    protected $fillable=[
        'id',
        'title',
        'image',
        'status',
        'author',
    ];
}
