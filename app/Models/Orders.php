<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = "order";
    public $timestamps = false;


    public function cart()
    {
        return $this->hasOne(cart_table::class, 'order_id', 'id');
    }
}
