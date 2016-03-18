<?php
/**
 * Created by PhpStorm.
 * User: Reinaldo
 * Date: 28/02/2016
 * Time: 10:56
 */

namespace Smart\Http\Requests;


class PainelEntradaCreateRequest extends Request
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
            'g-recaptcha-response'  => 'required|captcha',
            'cnpj'                  => 'required|unique:td_empresa',
            'ds_razao_social'       => 'required',
            'ie'                    => 'required',
        ];
        $messages = array(
            'email.required' => 'We need to know your e-mail address!',
        );

    }

    public function sanitize()
    {
        $input = $this->all();

        $input['cnpj'] = preg_replace("/[^0-9]/", "", $input['cnpj']);
        $input['ie']   = preg_replace("/[^0-9]/", "", $input['ie']);

        $this->replace($input);

        return $this->all();
    }


}
