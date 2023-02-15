<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\fromJSON;
use function MongoDB\BSON\toJSON;

class OrdersController extends Controller
{
    protected function pageOrder($id){
        $product = Product::where('id',$id)->get();
        return view('makeOrder',compact(['product']));
    }
    protected function newOrder(Request $request,$id){
        $validateFields = $request->validate([
            'total_price' => 'required',
            'destination' => 'required'
        ]);
        $total_price = $request->input('total_price');
        $destination = $request->input('destination');
        $user_id = Auth::user()->id;
        Order::create([
            'product_id' => $id,
            'user_id' => $user_id,
            'total_price' => $total_price,
            'destination' => $destination]
        );
        $decodedCart = json_decode(Auth::user()->cart,true);
        $decodedCart = $decodedCart['ids'];
        $pos = array_search($id, $decodedCart);
        if ($pos !== false) {
            unset($decodedCart[$pos]);
        }else{
            return to_route('index');
        }
        $cart = array(
            'ids' => $decodedCart
        );
        User::where('id', $user_id)->update([
           'cart'=> json_encode($cart)
        ]);
        return to_route('index');
    }
}
