<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'author',
        'news_img',
        'news_para',
        'status',
        'news_tag'
    ];
}
