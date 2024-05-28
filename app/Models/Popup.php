<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    use HasFactory;
    public $table = 'popup';
    protected $fillable=[
        'id',
        'author',
        'title',
        'status',
        'image'
    ];
}
