<?php

namespace Smart\Http\Controllers;

use Illuminate\Http\Request;
use Smart\Http\Requests;
use Smart\Http\Controllers\Controller;
use Smart\Movie;

class FrontController extends Controller
{
  public function __construct(){


      $this->middleware('web',['only' => 'auth']);
  }

   public function index(){
        return view('index');
   }

   public function contacto(){
        return view('contacto');
   }

   public function reviews(){
      $movies = Movie::Movies();
      return view('reviews',compact('movies'));
   }

   public function admin(){
        return view('admin.index');
   }
}
