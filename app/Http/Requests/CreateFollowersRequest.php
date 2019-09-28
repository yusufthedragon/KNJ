<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFollowersRequest extends FormRequest
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
            'nama' => 'required',
            'domisili' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|unique:followers,email',
            'password' => 'required',
            'foto' => 'required|max:2048|mimes:jpg,png,jpeg',
            'divisi_id' => 'required|exists:divisi,id',
            'tanggal_lahir' => 'required',
            'alamat' => 'required'
        ];
    }
}
