<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createPostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'title'=>'required|min:5|max:50',
            'image'=>'required|max:1000|mimes:jpeg,jpg,jpg',
            'text'=>'required|between:5,1000'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'مقدار عنوان الزامی می باشد',
            'title.min'=>'نباید مقدار عنوان کمتر از 5 تا کاراکتر باشد',
            'title.max'=>'نباید مقدار عنوان بیشتر از 100 تا کاراکتر باشد',
            'image.required'=>'مقدار عکس به صورت الزامی می باشد',
            'image.max'=>'مقدار عکس نباید  1 مگا بایت بیشتر باشد',
            'image.mimes'=>'عکس باید فرمت jpeg,jpg,png باشد',
            'text.required'=>'مقدار توضیحات الزامی می باشد',
            'text.between'=>'مقدار توصیحات بین 5 تا 1000 تا کاراکتر می باشد'
        ];
    }
}
