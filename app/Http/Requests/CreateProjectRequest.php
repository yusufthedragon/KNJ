<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'judul' => 'required|unique:projects,judul',
            'deskripsi' => 'required',
            'cover' => 'required|max:2048|mimes:jpg,png,jpeg',
            'kode_donasi' => 'max:100',
            'daftar_solia' => 'required',
            'timeline' => 'required'
        ];
    }
}
