<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'table_id', 'order_date', 'total', 'status'];
    protected $casts = [
        'order_date' => 'datetime',
    ];


    public function items()
    {
        return $this->hasMany(Orders_items::class, 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
