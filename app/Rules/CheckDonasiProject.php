<?php

namespace App\Rules;

use App\Models\Project;
use Illuminate\Contracts\Validation\Rule;

class CheckDonasiProject implements Rule
{
    private $jenis_donasi;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($jenis_donasi)
    {
        $this->jenis_donasi = $jenis_donasi;
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
        if ($this->jenis_donasi == 'Project') {
            $check = Project::find($value);

            return $check !== null;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Nama Project invalid.';
    }
}
