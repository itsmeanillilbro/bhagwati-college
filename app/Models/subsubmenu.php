<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subsubmenu extends Model
{
    use HasFactory;
    public $table = 'subsubmenu';
    public $fillable=[
        'id',
        'submenu_id',
        'menutitle',
        'submenutitle',
        'subsubmenutitle',
        'link',
        'status',
        'author',
        'description'
    ];

    public function submenu()
    {
        return $this->belongsTo(Submenu::class, 'submenu_id');
    }

}
