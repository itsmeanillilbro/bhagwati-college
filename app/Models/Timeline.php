<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    public $table = 'timeline';

    protected $fillable=[
        'id',
        'title',
        'text',
        'date',
        'status',
        'author',
    ];
}
