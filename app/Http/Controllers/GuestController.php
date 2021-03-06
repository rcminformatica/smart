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


class GuestController extends Controller
{
    private  $empresa;
    private  $usuario;
    private  $usuarioendereco;

  public function __construct(Empresa  $empresa, Usuario $usuario, UsuarioEndereco $usuarioendereco, User $user) {
         $this->empresa         = $empresa;
         $this->usuario         = $usuario;
         $this->usuarioendereco = $usuarioendereco;
         $this->user            = $user;



   }



    public function index()
    {
        return view('index');
    }



    public function create()
    {
        return view('layouts.frmCadastroEmbarcador');
        
       // return view('layouts.frmCadastroEmbarcadorConfirmacao');
    }


    public function store(PainelEntradaCreateRequest $request)
    {
        $empresa =  new Empresa;

        $empresa = Empresa::create([
                                    'ds_razao_social'  => $request['ds_razao_social'],
                                    'cnpj'             => $request['cnpj'],
                                    'ie'               => $request['ie'],
         ]);

        $user = User::create([
            'name' => $request['nm_usuario'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'id_empresa' => $empresa->id,
        ]);
        $usuario = new Usuario;

        $usuario = Usuario::create(['id_user'    => $user->id,
                                    'id_empresa' => $empresa->id,
                                    'cnpj'       => $empresa->cnpj,
                                    'nm_usuario' => $request['nm_usuario'],
                                    'email'   => $request['email'],
                                    'cd_senha'   => $request['cd_senha'],
                                    'id_empresa' => $empresa->id,
        ]);


        /*


         $usuarios = Usuarios::insert(
            array('ds_razao_social'             => $request->input('ds_razao_social')               ,
                'ds_nome_fantasia'              => $request->input('ds_nome_fantasia')               ,
                'cnpj'                          => $request->input('cnpj')                           ,
                'ie'                            => $request->input('ie')                             ,
                'ds_email'                      => $request->input('ds_email')                       ,
                'cd_senha'                      => $request->input('cd_senha')                       ,
                'cd_idioma'                     => $request->input('cd_idioma')                      ,
                'cep'                           => $request->input('cep')                            ,
                'ds_endereco'                   => $request->input('ds_endereco')                    ,
                'nu_endereco_numero'            => $request->input('nu_endereco_numero')             ,
                'ds_endereco_complemento'       => $request->input('ds_endereco_complemento')        ,
                'ds_bairro'                     => $request->input('ds_bairro')                      ,
                'ds_cidade'                     => $request->input('ds_cidade')                      ,
                'cd_cidade_ibge'                => $request->input('cd_cidade_ibge')                 ,
                'sg_uf'                         => $request->input('sg_uf')                          ,
                'tp_usuario'                    => $request->input('tp_usuario')                     ,
                'logotipo'                      => $request->input('logotipo')                       ,
                'id_ativo'                      => $request->input('id_ativo')                       ,
                'created_at'                    => $request->input('created_at')                     ,
                'updated_at'                    => $request->input('updated_at') ));
*/
      // Session::flash('message','Usuario Cadastrado com Sucesso!');
     //   return redirect('/cadastro')->with('message','store');

       //Session::flash('message','Usuario Actualizado Correctamente');
       // notify()->flash('Usuário Cadastrado com Sucesso!!','');

        notify()->flash('cadastro realizado com sucesso!', 'success');
        return view('layouts.frmCadastroEmbarcadorConfirmacao');

        //Alerta::add('alerta', ['text' => 'Confirma?', 'title' => 'Listado' ]);


    }






}
