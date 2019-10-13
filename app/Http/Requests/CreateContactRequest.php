<?php

namespace App\Http\Requests;

use App\Rules\CheckJenisContact;
use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'nama' => 'required|max:100',
            'jenis' => ['required', 'max:100', new CheckJenisContact()],
            'contact' => 'required',
            'keterangan' => 'max:50'
        ];
    }
}
