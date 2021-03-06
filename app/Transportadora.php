<?php

namespace Smart;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Transportadora extends Model
{
    use  SoftDeletes;

    protected $table = 'td_transportadora';
    protected $fillable = [
        'id'                    ,
        'id_empresa'                ,
        'cd_interno'                ,
        'ds_razao_social'			,
        'ds_nome_fantasia'			,
        'cnpj'						,
        'ie'						,
        'cep'						,
        'ds_endereco'				,
        'nu_endereco'	          	,
        'ds_endereco_complemento'	,
        'ds_bairro'				    ,
        'ds_cidade'				    ,
        'cd_cidade_ibge'			,
        'sg_uf'					    ,
        'tp_empresa'				,
        'ibge'                      ,
        'logotipo'					,
        'id_ativo'					,
        'created_at'				,
        'updated_at'				,
        'deleted_at'
    ];

    protected $hidden = [];
}
