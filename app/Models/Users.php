<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'userName','userEmail','userPassword'
        ,'userFullname','userPictures'
    ];
    protected $hidden = [
        'updated_at','created_at'
    ];
    public $timestamps = false;
}
