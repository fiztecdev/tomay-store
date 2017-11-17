<?php

namespace apptour\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaqueteTuristicoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ruta'=>'required',
            'costo'=>'required | numeric',
            'duración_dias'=>'required'
        ];
    }
}
