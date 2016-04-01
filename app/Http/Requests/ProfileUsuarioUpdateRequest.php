<?php
/**
 * Created by PhpStorm.
 * User: Reinaldo
 * Date: 28/02/2016
 * Time: 10:56
 */

namespace Smart\Http\Requests;


class ProfileUsuarioUpdateRequest extends Request
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
            'id'                => 'required' ,
            'nm_usuario'        => 'required',

        ];
        $messages = array(
            'email.email' => 'Informe um endereço de e-mail válido',

        );

    }

    public function sanitize()
    {
        $input = $this->all();

      //  $input['cnpj'] = preg_replace("/[^0-9]/", "", $input['cnpj']);
       // $input['cep'] = preg_replace("/[^0-9]/", "", $input['cep']);


      //  $this->replace($input);

        return $this->all();
    }


}
