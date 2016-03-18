<?php

namespace Smart\Http\Controllers;

use Smart\Http\Requests\LoginRequest;
use Illuminate\Http\Controllers;



use Smart\Usuario;
use Smart\Empresa;
use Smart\UsuarioEndereco;

use Smart\Http\Requests\ProfileUpdateEmpresaRequest;
use Session;
use Smart\User;
use DB;
use App\Alerta\Alerta;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public  $empresa;
    public  $usuario;
    public  $usuarioendereco;
    public  $user;


    public function __construct(Empresa  $empresa, Usuario $usuario, UsuarioEndereco $usuarioendereco, User $user) {

        $this->user            = $user::find(Auth::user()->id);
        $this->usuario         = $usuario::find($this->user->id);
        $this->empresa         = Empresa::where('cd_empresa', '=', $this->usuario->cd_empresa)->get();
        $this->usuarioendereco = $usuarioendereco::where([
                                                         'cd_usuario' => $this->usuario->id,
                                                         'cd_empresa' => $this->usuario->cd_empresa,
        ]);


        $this->middleware('auth');

    }

    public function index(){

        return view('profile.index',['empresa' =>$this->empresa]);
    }

    public function dashboard(){
        return view('admin.index');
    }

    public  function  UpdateEmpresa(ProfileUpdateEmpresaRequest $request){

        $empresa   = Empresa::where('cd_empresa', '=', 1 )->update(array(
            'cep' => $request['cep']

        ));
       // notify()->flash('Os dados da Empresa foram atualizados com sucesso!', 'success');
         Session::flash('message','Os dados da Empresa foram atualizados com sucesso!');
        return redirect(route('profile.index'));
        //atualiza camada do login
    }







}
