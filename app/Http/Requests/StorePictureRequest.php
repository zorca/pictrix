<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePictureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'files' => 'required|array|min:1|max:5',
            'files.*' => 'required|mimes:jpg,png,gif|dimensions:max_width=1024,max_height=1024',
        ];
    }

    public function messages(): array
    {
        return [
            'files.*.required' => 'Файл не выбран',
            'files.*.mimes' => 'Неразрешённый тип файла',
            'files.*.dimensions' => 'Слишком большое разрешение файла',
        ];
    }
}
