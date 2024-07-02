<?php

namespace App\Http\Requests\Log;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'bot_name' => 'required|string',
            'client_id' => 'required|string',
            'text' => 'required|string',
            'note' => '',
            'log_type_id' => 'required|string'
        ];
    }
}
