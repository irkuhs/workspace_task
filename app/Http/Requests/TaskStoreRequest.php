<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'datetime' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Sila isi nama task',
            'datetime.required' => 'Sila pilih tarikh dan waktu',
        ];
    }
}
