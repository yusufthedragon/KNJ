<?php

namespace App\Http\Requests;

use App\Rules\CheckDonasiProject;
use Illuminate\Foundation\Http\FormRequest;

class CreateDonasiRequest extends FormRequest
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
            'email' => 'required',
            'no_telepon' => 'required',
            'tanggal_transfer' => 'required',
            'bank' => 'required',
            'nominal' => 'required',
            'bukti_transfer' => 'required|max:2048|mimes:jpg,png,jpeg',
            'nama_project' => [new CheckDonasiProject($this->jenis)]
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nama' => 'Nama',
            'email' => 'E-mail',
            'no_telepon' => 'No. Telepon',
            'tanggal_transfer' => 'Tanggal Transfer',
            'bank' => 'Bank',
            'nominal' => 'Nominal',
            'bukti_transfer' => 'Bukti Transfer',
            'nama_project' => 'Nama Project'
        ];
    }
}
