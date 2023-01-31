<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class eventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'events.title' => 'required|string|max:50',
            'events.address' => 'required|string|max:50',
            'events.date'=>'required',
            'events.description' => 'required|string|max:200',
        ];
    }
}
