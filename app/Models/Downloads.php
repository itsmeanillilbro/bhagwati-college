<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Downloads extends Model
{
    use HasFactory;

    public $table = 'downloads';
    protected $fillable=[
        'id',
        'title',
        'title1',
        'file',
        'table_id'

    ];

    public function downloadstable()
    {
        return $this->belongsTo(Downloadstable::class);
    }
}
