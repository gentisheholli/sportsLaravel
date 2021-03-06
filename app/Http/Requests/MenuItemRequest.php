<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuItemRequest extends FormRequest
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

    public function messages()
    {
        return [
            'menu_id.required' => 'Menu ID required!',
            'name.required' => 'Name is required!',
            'order.required' => 'Order is required!',
            'status.required' => 'Status is required!',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'menu_id'=> 'required',
            'name' => 'required',
            'order' => 'required',
            'status' => 'required'
        ];
    }
}
