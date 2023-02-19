<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function getImage($id){
        $product = Product::where('id',$id)->first();
        $decoded = json_decode($product->image,true);
        return $decoded[0]['name'];
    }
}
