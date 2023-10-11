<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AnggotaRequest extends FormRequest
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
            'nama'       => 'required|min:2|max:150',
            'sex'        => 'required|min:2|max:15' ,
            'agama'      => 'required|min:2|max:20' ,
            'alamat'     => 'required|min:2'        ,
            'telepon'    => 'required|min:10|max:15',
            'jabatan_id' => 'required'              ,
            'devisi_id'  => 'required'              ,
            'sektor_id'  => 'required'              ,
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
