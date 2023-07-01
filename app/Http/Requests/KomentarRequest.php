<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class KomentarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'postingan_id' => 'required'             ,
            'alias'        => 'required|min:2|max:50',
            '_komentar'    => 'required'             ,
            'asal'         => 'required'             ,
            'mac_address'  => 'required'             ,
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'response' => array(
                'icon'    => 'error'                               ,
                'title'   => 'Validasi Gagal'                      ,
                'message' => 'Data yang di input tidak tervalidasi',
            ),
            'errors' => array(
                'length' => count($validator->errors()),
                'data'   =>       $validator->errors()
            ),
        ], 422));
    }
}
