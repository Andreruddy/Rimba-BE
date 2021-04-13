<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class itemRequest extends FormRequest
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
            'nama_item' => 'required',
            'unit' => 'required',
            'stok' => 'required|integer',
            'harga_satuan'=> 'required|integer',
            'harga_grosir'=> 'required|integer',
            'image'=> 'required|image'
        ];
    }
}
