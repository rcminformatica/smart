<?php

namespace Smart\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Smart\Http\Requests\LoginRequest;
use Illuminate\Http\Controllers;

use Request;
use Smart\Usuario;
use Smart\Empresa;
use Smart\UsuarioEndereco;
use Smart\Http\Requests\ProfileEmpresaUpdateRequest;
use Smart\Http\Requests\ProfileUsuarioStoreRequest;
use Smart\Http\Requests\ProfileUsuarioUpdateRequest;
use Session;
use Smart\User;
use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException as x;


class ProfileController extends Controller
{
    public  $empresa;
    public  $usuario;
    public  $usuarioendereco;
    public  $user;
    public  $usuarioempresa;


    public function __construct(Empresa  $empresa, Usuario $usuario, UsuarioEndereco $usuarioendereco, User $user) {

        $this->user            = $user::find(Auth::user()->id);
        $this->empresa         = $empresa::find($this->user->id_empresa);
        $this->usuario         = $usuario::where('id_user','=',$this->user->id )->get();
        $this->usuarioempresa  = $usuario::where('id_empresa','=',$this->user->id_empresa );
        $this->middleware('auth');

    }
 //USUARIO


    public function UsuarioIndex(){

        $usuarios = Usuario::where('id_empresa','=',$this->user->id_empresa )->paginate(10);

        return view('profile.ProfileUsuario',['usuarios' =>$usuarios ]);
    }



    public function UsuarioSearch(Request $request){
        $filter = Request::input('filter');

        $usuarios = Usuario::where('nm_usuario', $filter)
            ->orWhere('nm_usuario', 'like', '%' . $filter . '%')->paginate(10);

        //$usuarios = $usuarios ->contains( $filter );


        return view('profile.ProfileUsuario',['usuarios' =>$usuarios ]);
    }
    public function UsuarioEdit($id){
       // $id  = Request::input('id');

        $usuarios         = Usuario::where('id', '=', $id )->get();

        //   $usuarios         = Usuario::where('id', '=', $id)->get();
        return view('profile.ProfileUsuarioEdit',['usuarios' => $usuarios]);

    }

    public function UsuarioDestroy($id){
       // $id  = Request::input('id');
        $x             = Usuario::find($id);
        $y             = User::find($x->id_user);

        $x->delete();
        $y->delete();

        Session::flash('message','Usuário Eliminado!');

        notify()->flash('Usuário Cadastrado com Sucesso!!','');

        return redirect(route('profile.UsuarioIndex'));

    }

    public function UsuarioCreate(){

        return view('profile.ProfileUsuarioCreate');

    }


    public  function  UsuarioUpdate(ProfileUsuarioUpdateRequest $request){

        $usuario   = Usuario::where('id', '=', $request['id'] )->update(array(
            'nm_usuario'             => $request['nm_usuario'],
            'email'               => $request['email'
            ]

        ));


        Session::flash('message','Usuário atualizado com sucesso!!');



        return redirect(route('profile.UsuarioIndex'));
        //atualiza camada do login
    }


    public  function  UsuarioStore(ProfileUsuarioStoreRequest $request){
        $errors = null;
        try {

            $user = User::create([
                'name' => $request['nm_usuario'],
                'email' => $request['email'],
                'password' => bcrypt($request['cd_senha']),
                'id_empresa' => $this->empresa->id,
            ]);


            $usuario = Usuario::create([
                'id_user' => $user->id,
                'id_empresa' => $this->empresa->id,
                'cnpj' => $this->empresa->cnpj,
                'cd_idioma' => 'POR',
                'id_ativo' => 'S',
                'nm_usuario' => $request['nm_usuario'],
                'email' => $request['email'],
                'cd_senha' => $request['cd_senha'],
            ]);

            Session::flash('message', 'Usuário Criado com sucesso!');

            //atualiza camada do login
        }catch ( x $e){
                    $errorCode = $e->errorInfo[1];


                    if($errorCode == 1062){
                        $errors = 'O E-mail informado '.'<strong>'.$request['email'].'</strong>'.' ja está em uso !';
                     }
                    else if($errorCode == 1048) {
                        $errors = $e->getMessage();
                     } else {
                        $errors = $e->getMessage();
                    }



            }

        return redirect(route('profile.UsuarioIndex'))->withErrors($errors );
        //return view('profile.ProfileUsuario')->with('usuarios',$this->usuarioempresa)->withErrors($errors );

    }

//EMPRESA
    public function index(){

        return view('profile.ProfileEmpresaEdit',['r1' =>$this->empresa]);
    }
    public function dashboard(){
        return view('admin.index');
    }
    public  function  EmpresaUpdate(ProfileEmpresaUpdateRequest $request){

        $empresa   = Empresa::where('id', '=', $request['id'] )->update(array(
                                    'cd_interno'               => $request['cd_interno'],
                                    'ds_nome_fantasia'         => $request['ds_nome_fantasia'],
                                    'cep'                     => $request['cep'],
                                    'ds_cidade'               => $request['ds_cidade'],
                                    'sg_uf'                   => $request['sg_uf'],
                                    'ds_bairro'               => $request['ds_bairro'],
                                    'ds_endereco'             => $request['ds_endereco'],
                                    'ds_endereco_complemento' => $request['ds_endereco_complemento'],
                                    'nu_endereco'             => $request['nu_endereco'],
                                    'ibge'                    => $request['ibge'],
                                    'ds_endereco_complemento' => $request['ds_endereco_complemento']

        ));
        // notify()->flash('Os dados da Empresa foram atualizados com sucesso!', 'success');
        Session::flash('message','Os dados da Empresa foram atualizados com sucesso!');
        return redirect(route('profile.index'));
        //atualiza camada do login
    }


}
