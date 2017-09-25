<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class PartitionController extends Controller{

   public function index(){
      $shirts = Product::all();
      return view('partition.home')->with('shirts', $shirts);
   }

   public function shirts(){
      $shirts = Product::all();
      return view('partition.shirts')->with('shirts', $shirts);
   }

   public function shirt(){
      return view('partition.shirt');
   }

}
