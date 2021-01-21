<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'league_id.required' => 'League ID is required!',
            'name.required' => 'Name is required!',
            'nickname.required' => 'Nickname is required!',
            'ground.required' => 'Ground is required!',
            'website.required' => 'Website URL is required!',
            'points.required' => 'Points are required!',
            'order.required' => 'Order is required!',
            'status.required' => 'Status is required!'
    
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
            'league_id' => 'required',
            'name' => 'required',
            'nickname' => 'required',
            'ground' => 'required',
            'website' => 'required',
            'points' => 'required',
            'order' => 'required',
            'status' => 'required'
        ];
    }
}
