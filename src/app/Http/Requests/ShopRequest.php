<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'shop_name' => 'required',
            'area_id' => 'required',
            'genre_id' => 'required',
            'description' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'shop_name.required' => '店舗名は必ず記入して下さい',
            'area_id.required' => 'エリアは必ず選択して下さい',
            'genre_id.required' => 'ジャンルは必ず選択して下さい'
        ];
    }
}
