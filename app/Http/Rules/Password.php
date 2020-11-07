<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Rules;

use Laravel\Fortify\Rules\Password as PasswordParentRule;

/**
 * Description of Password
 *
 * @author jaredclemence
 */
class Password extends PasswordParentRule {
    public function __construct() {
        $this->length($_SERVER["PASSWORD_MIN_LENGTH"]);
    }
    
}
