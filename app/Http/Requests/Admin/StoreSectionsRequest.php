<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionsRequest extends FormRequest
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
            'title' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg,gif,svg',
            'photo_sport' => 'nullable|mimes:png,jpg,jpeg,gif,svg',
            'photo_section_menu' => 'nullable|mimes:png,jpg,jpeg,gif,svg',
            'description' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно к заполнению.'
        ];
    }
}
