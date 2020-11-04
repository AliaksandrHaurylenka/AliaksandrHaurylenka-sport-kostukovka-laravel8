<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Str;

class ServicesRequest extends FormRequest
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
            'service' => 'required',
            'price' => 'numeric|between:0.01,99.99|nullable',
            'price_the_evening' => 'numeric|between:0.01,99.99|nullable',
            'price_5_lessons' => 'numeric|between:0.01,99.99|nullable',
            'price_10_lessons' => 'numeric|between:0.01,99.99|nullable',
            'price_other' => 'numeric|between:0.01,99.99|nullable',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $price = Str::replaceFirst(',', '.', Request::input('price'));
        $price_the_evening = Str::replaceFirst(',', '.', Request::input('price_the_evening'));
        $price_5_lessons = Str::replaceFirst(',', '.', Request::input('price_5_lessons'));
        $price_10_lessons = Str::replaceFirst(',', '.', Request::input('price_10_lessons'));
        $price_other = Str::replaceFirst(',', '.', Request::input('price_other'));


        $this->merge([
            'price' => $price,
            'price_the_evening' => $price_the_evening,
            'price_5_lessons' => $price_5_lessons,
            'price_10_lessons' => $price_10_lessons,
            'price_other' => $price_other
        ]);
    }
}
