<?php
namespace Smart\Cep;

use Correios;

class Cep
{

	public  $cidade;
	public  $logradouro;

	public function cep($cep) {

		$ceps = Correios::cep($cep);
		$this->cidade = $ceps['cidade'];
		$this->logradouro = $ceps['logradouro'];



       return null;



	}

	public function cidade () {

		return $this->cidade;


	}

	public function logradouro () {

		return $this->logradouro;


	}


}