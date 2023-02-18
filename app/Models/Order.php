<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'product_id',
        'user_id',
        'total_price',
        'destination'
    ];
    use HasFactory, HasUuids;
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
