<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NguoiDung extends Authenticatable
{
    use HasFactory;
    protected $table = 'nguoi_dung';
    protected $fillable = ['username', 'nd_email', 'nd_sdt', 'password'];
    protected $hidden = ['password'];
}
