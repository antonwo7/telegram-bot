<?php

namespace App\Http\Requests\Log;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'bot' => '',
            'log_type_id' => '',
            'client' => '',
            'date_from' => '',
            'date_to' => '',
            'page' => ''
        ];
    }
}
