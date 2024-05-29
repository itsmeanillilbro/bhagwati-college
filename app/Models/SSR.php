<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SSR extends Model
{
    use HasFactory;

    public $table = 'SSR';
    protected $fillable=[
        'id',
        'title',
        'author',
        'file',
        'status'
    ];
}
