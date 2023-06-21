<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'book_child_category_id' => 'required|exists:book_child_categories,id',
            'title' => 'required|unique:book_categories,title',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,svg',
            'file' => 'required|mimes:pdf|max:10000',
        ];
    }
}
