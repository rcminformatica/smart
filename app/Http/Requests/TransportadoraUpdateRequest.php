<?php
/**
 * Created by PhpStorm.
 * User: Reinaldo
 * Date: 28/02/2016
 * Time: 10:56
 */

namespace Smart\Http\Requests;


class TransportadoraUpdateRequest extends Request
{


    public function authorize()
    {
        return true;
    }
    /**
     * Sanitize input before validation.
     *
     * @return array
     */

    public function rules()
    {
        $this->sanitize();

        return [
            'ds_nome_fantasia'  => 'required',
            'cd_interno'        => 'required',
            'id'                => 'required' ,
            'cep'               => 'required|min:8',
            'nu_endereco'       => 'required',
            'ds_endereco'       => 'required',
            'ibge'              => 'required|min:7',
            'ds_endereco_complemento' => '',

          //  'cnpj'              => 'required',
          //  'ds_razao_social'   => 'required',
            'ds_cidade'         => 'required',
            'sg_uf'             => 'required',
         //   'cnpj'                  => 'required|min:14',
        //    'ds_razao_social'       => 'required',
        ];
        $messages = array(
            'cep.min' => 'O CEP deve conter 8 caracteres!',

        );

    }

    public function sanitize()
    {
        $input = $this->all();

      //  $input['cnpj'] = preg_replace("/[^0-9]/", "", $input['cnpj']);
        $input['cep'] = preg_replace("/[^0-9]/", "", $input['cep']);


        $this->replace($input);

        return $this->all();
    }


}
