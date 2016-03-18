<?php
namespace App\Alerta;

use Codecourse\Notify;
 
class Alerta  
{
 
	  public static function add($tipo, array $opcao = [] )
	 {
	 	 
	 	$text = array_get($opcao, 'text');

	 	 if ($tipo == 'alerta') {
			notify()->flash($text, 'success',[
				'timer'  => '2000',
				]);   
	 	 }
	 }	

	 
}