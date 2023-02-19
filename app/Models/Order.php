<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'products',
        'user_id',
        'total_price',
        'destination',
        'country',
        'city',
        'first_name',
        'last_name',
        'zip',
        'card_info'
    ];
    use HasFactory, HasUuids;
    public function products($products)
    {
        $products = json_decode($products,true);
        $productsArray = array();
        foreach($products as $key => $value){
            $product = Product::where('id',$value)->first();
            $product = $product->toArray();
            array_push($productsArray,$product['name']);
        }
        return $productsArray;
    }
}
