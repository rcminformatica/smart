<?php

namespace Smart;

use Illuminate\Database\Eloquent\Model;

class UsuarioEndereco extends Model
{
    protected $table = "td_usuario_endereco";

    protected $fillable = [
        'cd_usuario',
        'cd_empresa',
        'cnpj',
        'cep',
        'ds_endereco',
        'nu_endereco',
        'ds_endereco_complemento',
        'ds_bairro',
        'ds_cidade',
        'cd_cidade_ibge',
        'sg_uf',
        'id_ativo',
        'created_at',
        'updated_at',
    ];
}
