<?php

namespace App\Rules;

use App\Models\Contact;
use Illuminate\Contracts\Validation\Rule;

class CheckJenisContact implements Rule
{
    /**
     * ID of updated contact.
     *
     * @var string
     */
    private $id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id = null)
    {
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->id === null) {
            if ($value != 'Telepon' && $value !== 'E-mail') {
                $check = Contact::where('jenis', $value)->first();
            } else {
                $check = null;
            }
        } else {
            if ($value != 'Telepon' && $value !== 'E-mail') {
                $check = Contact::where('jenis', $value)->where('id', '!=', $this->id)->first();
            } else {
                $check = null;
            }
        }

        return $check === null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Contact sudah ada.';
    }
}
