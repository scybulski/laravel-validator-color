<?php

namespace scybulski\Validator\Color\Rules;

use Illuminate\Contracts\Validation\Rule;

class ColorLongHex implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        preg_match(
            '/^#(\d|a|b|c|d|e|f){6}$/i',
            $value,
            $m
        );
        return count($m) > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The given value is not a valid long hex color.';
    }
}
