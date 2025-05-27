<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $fillable = ['id_category','name_menu','image','harga','deskripsi'];

    public function category()
    {
        return $this->belongsTo(Category::class,'id_category','id');
    }
}
