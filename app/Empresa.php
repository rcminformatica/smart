<?php

namespace Smart;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use  SoftDeletes;

    protected $table = 'td_empresa';
    protected $fillable = [
        'cd_empresa'                ,
        'cd_interno'                ,
        'ds_razao_social'			,
        'ds_nome_fantasia'			,
        'cnpj'						,
        'ie'						,
        'cd_senha'					,
        'cd_idioma'				    ,
        'cep'						,
        'ds_endereco'				,
        'nu_endereco'	          	,
        'ds_endereco_complemento'	,
        'ds_bairro'				    ,
        'ds_cidade'				    ,
        'cd_cidade_ibge'			,
        'sg_uf'					    ,
        'tp_empresa'				,
        'logotipo'					,
        'id_ativo'					,
        'created_at'				,
        'updated_at'				];

    protected $hidden = [];
}
