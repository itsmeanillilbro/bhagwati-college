<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    public $table = 'notice';

    protected $fillable=[
        'id',
        'title',
        'image',
        'status',
        'author',
    ];
}
