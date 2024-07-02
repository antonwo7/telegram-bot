<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class WebStoreRequest extends FormRequest
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
            'telegram_account' => 'required|string',
            'telegram_account_id' => 'required|string',
            'bot_id' => 'required|string',
            'msp_key' => 'string'
        ];
    }
}
