<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;

    public $table = 'academic';

    protected $fillable = [
        'id',
        'author',
        'academic_title',
        'status',
        'academic_img',
        'academic_para',
        'duration'
    ];
    protected $attributes = [
        'status' => 'draft'
    ];
}
