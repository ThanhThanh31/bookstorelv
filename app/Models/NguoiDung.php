<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NguoiDung extends Authenticatable
{
    use HasFactory;
    protected $table = 'nguoi_dung';
    protected $primaryKey = 'nd_id';
    protected $fillable = ['username', 'email', 'nd_anh', 'nd_trangthai', 'nd_sdt', 'password', 'nd_diachi', 'q_id', 'qt_id'];
    protected $hidden = ['password'];
}
