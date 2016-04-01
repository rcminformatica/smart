<?php

namespace Smart\Http\Controllers;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Smart\Http\Requests\TransportadoraUpdateRequest;
use Smart\Http\Requests\LoginRequest;
use Illuminate\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Smart\Http\Requests\TransportadoraCreateRequest;
use Smart\Usuario;
use Smart\Empresa;
use Smart\UsuarioEndereco;
use Smart\Transportadora;


use Smart\User;
use DB;
use App\Alerta\Alerta;
use Session;










class TransportadoraController extends Controller
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

    public function index()
    {
        $transportadoras = Transportadora::where('id_empresa','=',$this->user->id_empresa)->paginate(10);

       return view('transportadora.TransportadoraIndex',['transportadoras'=>$transportadoras]);
    }



    public function create()
    {
        return view('transportadora.TransportadoraCreate');

    }


    public function edit($id)
    {

        return view('transportadora.TransportadoraEdit')
            ->with('r1', Transportadora::find($id));


        // return view('layouts.frmCadastroEmbarcadorConfirmacao');
    }
    public  function  update(TransportadoraUpdateRequest $request){

        $empresa   = Transportadora::where('id', '=', $request['id'] )->update(array(
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
        Session::flash('message','Os dados da Transportadora foram atualizados com sucesso!');
        return redirect(route('painel/transportadora.index'));
        //atualiza camada do login
    }

    public function destroy($id)
    {
        $transportadora   = Transportadora::find($id)->delete();



        // notify()->flash('Os dados da Empresa foram atualizados com sucesso!', 'success');
        Session::flash('message','Transportadora excluída com sucesso!');
        return redirect(route('painel/transportadora.index'));
        //atualiza camada do login

        // return view('layouts.frmCadastroEmbarcadorConfirmacao');
    }


    public  function  store(TransportadoraCreateRequest $request){




        $transportadora   = Transportadora::create([
            'id_empresa'               =>$this->user->id_empresa,
            'cd_interno'               => $request['cd_interno'],
            'ds_razao_social'          => $request['ds_razao_social'],
            'ds_nome_fantasia'         => $request['ds_nome_fantasia'],
            'cnpj'                     => $request['cnpj'],
            'cep'                     => $request['cep'],
            'ds_cidade'               => $request['ds_cidade'],
            'sg_uf'                   => $request['sg_uf'],
            'ds_bairro'               => $request['ds_bairro'],
            'ds_endereco'             => $request['ds_endereco'],
            'ds_endereco_complemento' => $request['ds_endereco_complemento'],
            'nu_endereco'             => $request['nu_endereco'],
            'ibge'                    => $request['ibge'],
            'ds_endereco_complemento' => $request['ds_endereco_complemento'],
        ]);
        // notify()->flash('Os dados da Empresa foram atualizados com sucesso!', 'success');
        Session::flash('message','Transportadora cadastrada com sucesso!');
        return redirect(route('painel/transportadora.index'));
        //atualiza camada do login
    }






}
