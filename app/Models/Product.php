<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type_id',
        'image',
        'description',
        'price',
        'sale',
        'available',
        'chars'
    ];
    public function getImage($image){
        $decoded = json_decode($image,true);
        return $decoded[0]['name'];
    }
}
