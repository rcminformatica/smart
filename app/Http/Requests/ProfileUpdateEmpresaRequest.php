<?php
/**
 * Created by PhpStorm.
 * User: Reinaldo
 * Date: 28/02/2016
 * Time: 10:56
 */

namespace Smart\Http\Requests;


class ProfileUpdateEmpresaRequest extends Request
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
            'cd_empresa'        => 'require' ,
            'cep'               => 'required|min:8',
            'nu_endereco'       => 'required',
            'ds_endereco'       => 'required',
           // 'cnpj'              => 'required',
          //  'ds_razao_social'   => 'required',
            'ds_cidade'         => 'required',
            'sg_uf'             => 'required',
         //   'cnpj'                  => 'required|min:14',
        //    'ds_razao_social'       => 'required',
        ];
        $messages = array(
            'cep.min' => 'O CEO deve conter 8 caracteres!',
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
