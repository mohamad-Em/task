<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pictures extends Model
{
    use HasFactory;
    protected $table = 'pictures';
    protected $fillable = [
        'picturesID','pictureName','picture','album_ID'
    ];
    public $timestamps = false;
}
