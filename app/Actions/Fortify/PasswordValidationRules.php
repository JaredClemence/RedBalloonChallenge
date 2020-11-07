<?php

namespace App\Actions\Fortify;

use App\Http\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        if($_SERVER["PASSWORD_MIN_LENGTH"] > 0){
            return ['required', 'string', new Password, 'confirmed'];
        }else{
            return [new Password, 'confirmed'];
        }
    }
}
