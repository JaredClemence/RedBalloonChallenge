<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property bool $opted_in_emails
 * 
 */
class GameRegistration extends Pivot
{
    /**
     * @return bool
     */
    public function wantsEmail() {
        return $this->opted_in_emails;
    }
    public function opt_in(){
        $this->opted_in_emails = true;
    }
    public function opt_out(){
        $this->opted_in_emails = false;
    }
}
