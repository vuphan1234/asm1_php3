<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
    public function rules()
    {
        return [
            'keyword' => 'required|string|min:3|max:255',
        ];
    }
    public function messages()
    {
        return [
            'keyword.required' => 'Vui lòng nhập từ khóa tìm kiếm.',
            'keyword.string' => 'Từ khóa tìm kiếm phải là một chuỗi ký tự.',
            'keyword.min' => 'Từ khóa phải có ít nhất 3 ký tự.',
            'keyword.max' => 'Từ khóa không được quá 255 ký tự.',
        ];
    }
}
