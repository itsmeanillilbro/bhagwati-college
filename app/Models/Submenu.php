<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;


    public $table= 'submenu';
    public $fillable=[
        'id',
        'menu_id',
        'title',
        'title1',
        'link',
        'status',
        'author',
        'description'

    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function subsubmenus()
    {
        return $this->hasMany(Subsubmenu::class, 'submenu_id');
    }
}
