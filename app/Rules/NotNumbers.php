<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NotNumbers implements ValidationRule
{
    /**
     * Run the validation rule.
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $name, mixed $value, Closure $fail): void
    {
        if (is_numeric($value)){
            $fail($name.''.'is invalid');
        }
    }
}
