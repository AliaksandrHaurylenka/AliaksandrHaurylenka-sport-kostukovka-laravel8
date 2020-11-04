<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentsRequest extends FormRequest
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
            
            'text' => 'required',
            'user_id' => 'max:2147483647|nullable|numeric',
            'post_id' => 'max:2147483647|nullable|numeric',
            //'status' => 'max:2147483647|nullable|numeric',
        ];
    }
}
