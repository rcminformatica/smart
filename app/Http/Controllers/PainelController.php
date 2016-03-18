<?php

namespace Smart\Http\Controllers;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Smart\Http\Requests\PainelEntradaCreateRequest;
use Smart\Http\Requests\LoginRequest;
use Illuminate\Http\Controllers;


use Smart\Usuario;
use Smart\Empresa;
use Smart\UsuarioEndereco;


use Smart\User;
use DB;
use App\Alerta\Alerta;


class PainelController extends Controller
{
    private  $empresa;
    private  $usuario;
    private  $usuarioendereco;

  //  public function __construct(Empresa  $empresa, Usuario $usuario, UsuarioEndereco $usuarioendereco, User $user) {
 //       $this->empresa         = $empresa;
  //      $this->usuario         = $usuario;
  //      $this->usuarioendereco = $usuarioendereco;
  //      $this->user            = $user;
        public function __construct() {
        $this->middleware('auth');

    }


    public function index(){
        return view('admin.index');
    }

    public function dashboard(){
        return view('admin.index');
    }





}
