<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Downloadstable extends Model
{
    use HasFactory;
    public $table = 'downloadstable';
    protected $fillable=[
        'id',
        'title',
        'status',
        'author',
    ];
    public function downloads(){
        return $this->hasMany(Downloads::class);
    }
}
