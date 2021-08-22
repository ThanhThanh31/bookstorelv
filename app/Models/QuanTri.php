<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class QuanTri extends Authenticatable
{
    use HasFactory;
    protected $table = 'quan_tri';
    protected $primaryKey = 'qt_id';
    protected $fillable = ['username', 'password', 'email'];
    protected $hidden = ['password'];
}
