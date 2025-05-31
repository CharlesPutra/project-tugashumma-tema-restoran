<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_items extends Model
{
    use HasFactory;


    protected $fillable = ['order_id', 'menu_id', 'price', 'quantity'];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
