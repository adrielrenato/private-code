<?php

namespace App\Http\Requests;

use App\Core\Facades\TenantFacade;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerFormRequest extends FormRequest
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
            'name' => 'required|string|between:3,120',
            'email' => [
                'required',
                'email',
                Rule::unique('customers')
                    ->where('account_id', TenantFacade::account()->id)
                    ->ignore($this->customer)
            ],
            'phone' => ''
        ];
    }
}
