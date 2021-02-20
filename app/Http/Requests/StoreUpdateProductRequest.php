<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        $id = $this->segment(2);
        return [
            'name' => 'required|min:3|max:255|unique:products,name,{$id},id',
            'description' => 'required|min:3|max:10000',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome é obrigatório!',
            'name.min' => 'O campo Nome necessita de no mínimo 3 caracteres!',
            'description.required' => 'Você precisa informar a descrição do Produto!',
            'description.min' => 'Você precisa inserir ao menos 3 caracteres na Descrição!',
            'price.required' => 'Você precisa informar um Preço!',
            'price.numeric' => "O campo 'Preço' precisa ser informado com números, apenas!"
        ];
    }
}
