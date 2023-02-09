<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class GetController extends Controller
{
    protected function GetIndex(Request $request){
        $types = DB::table('types')->get();
        if($request->input('search') !== null){
            $validateFields = $request->validate([
                'search' => 'required'
            ]);
            $search = $request->input('search');
            $result = DB::table('products')->where('name','ILIKE',"%{$search}%")->get();
            return view('index',compact(['types','result']));
        }else{
            return view('index', compact(['types']));
        }
    }
    protected function GetAdmin(){
        $types = DB::table('types')->get();
        $chars = DB::table('chars')->get();
        return view('admin', compact(['types','chars']));
    }
    protected function GetType($id){
        $type_id = $id;
        $products = DB::table('products')->where('type_id','=',$type_id)->get();
        return view('type', compact(['products','type_id']));
    }
    protected function GetProduct($id,$product_id){
        $product = DB::table('products')->where('id','=',$product_id)->get();
        foreach($product as $productItem){
            $decodedChars = json_decode($productItem->chars, true);
        }
        if(Auth::check()){
            $cartDecoded = json_decode(Auth::user()->cart,true);
            $favsDecoded = json_decode(Auth::user()->favorite,true);
            $cartIds = $cartDecoded['ids'];
            $favsIds = $favsDecoded['ids'];
            $i = 0;
            return view('product',compact(['product','cartIds','i','favsIds','decodedChars']));
        }
        return view('product',compact(['product','decodedChars']));
    }
    protected function GetCart(){
        $userCart = DB::table('users')->where('id', '=', Auth::user()->id)->get('cart');
        foreach($userCart as $cartEncodedItem){
            $cartDecoded = json_decode($cartEncodedItem->cart,true);
            $products = DB::table('products')->whereIn('id',$cartDecoded['ids'])->get();
        }
        return view('cart',compact(['products']));
    }
    protected function GetFavs(){
        $userFavs = DB::table('users')->where('id', '=', Auth::user()->id)->get('favorite');
        foreach($userFavs as $favsEncodedItem){
            $favsDecoded = json_decode($favsEncodedItem->favorite,true);
            $products = DB::table('products')->whereIn('id',$favsDecoded['ids'])->get();
        }
        return view('favs',compact(['products']));
    }
}
