<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'binhluan_sanpham';
    protected $primaryKey = 'bs_id';
    protected $fillable = ['bs_noidung', 'reply_id', 'nd_id', 'sp_id'];

    public function cus (){
        return $this->hasOne(NguoiDung::class, 'nd_id', 'bs_id');
    }

    public function replies (){
        return $this->hasMany(Comment::class, 'reply_id', 'bs_id');
    }
}
