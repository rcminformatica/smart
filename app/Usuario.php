<?php

namespace Smart;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Usuario extends Model
{
    use  SoftDeletes;
    protected $table = "td_usuario";

    protected $fillable = [
        'id'       ,
        'cd_empresa',
        'cnpj',
        'nm_usuario',
        'ds_email',
        'nu_telefone',
        'nu_celular',
        'cd_senha',
        'cd_idioma',
        'id_ativo',
        'created_at',
        'updated_at'
    ];

    //
    protected $hidden = ['cd_senha'];
}
