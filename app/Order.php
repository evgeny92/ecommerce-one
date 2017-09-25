<?php

namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model{

    protected $fillable = ['total', 'delivered'];

   public function user(){
      return $this->belongsTo('App\User');
   }

   public function orderItems(){
      return $this->belongsToMany('App\Product')->withPivot('qty', 'total');
   }


   public static function createOrder(){

      //create the order
      $user = Auth::user();
      $order = $user->order()->create([
         'total' => Cart::total(),
         'delivered' => 0
      ]);

      $cartItems = Cart::content();
      foreach($cartItems as $cartItem){
         $order->orderItems()->attach($cartItem->id, [
            'qty' => $cartItem->qty,
            'total' => $cartItem->qty*$cartItem->price
         ]);
      }

   }

}
