<?php

namespace Smart;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Usuario extends Model
{
    use  SoftDeletes;
    protected $table = 'td_usuario';

    protected $fillable = [
        'id',
        'id_empresa',
        'id_user',
        'cd_interno',
        'cd_usuario'    ,
        'cnpj'          ,
        'nm_usuario'    ,
        'email'         ,
        'nu_telefone'   ,
        'nu_celular'    ,
        'cd_senha'      ,
        'cd_idioma'     ,
        'id_ativo'      ,
        'created_at'    ,
        'updated_at'    ,
        'deleted_at'
    ];

    protected $hidden = ['cd_senha'];
}
