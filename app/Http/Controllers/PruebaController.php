<?php

namespace Smart\Http\Controllers;

use Illuminate\Http\Request;
use Smart\Http\Requests;
use Smart\Http\Controllers\Controller;

class PruebaController extends Controller
{
	public function index(){
		return "Hola desde Index";
	}

	public function nombre($nombre){
		return "Hola mi nombre es: ".$nombre;
	}
}
