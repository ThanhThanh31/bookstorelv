<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'san_pham';
    protected $primaryKey = 'sp_id';
    protected $fillable = ['sp_ten', 'sp_hinhanh', 'sp_soluong', 'sp_sotrang', 'sp_kichthuoc', 'sp_gia', 'sp_mota'];
}
