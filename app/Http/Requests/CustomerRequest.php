<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        $id = $this->request->get('id');
        return [
            'name'=>'required|max:255',
            // loại trừ validate email nếu customer có id  = value id trong ô input hidden mà chúng ta tạo thêm ở view update
            'email'=>'required|email|unique:customers,email,'. $id . ',id',
        ];
    }

    function messages()
    {
        return[
            'name.required'=> 'Name không được để trống  ',
            'name.max'=> 'name qua so ky tu cho phep',
            'email.required'=> 'Email không được để trống',
            'email.unique'=> 'Email đã tồn tại',
            'email.email'=> 'Email sai định dạng',

        ];
    }
}
