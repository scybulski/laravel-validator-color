<?php

namespace scybulski\Validator\Color\Rules;

use Illuminate\Contracts\Validation\Rule;

class ColorHex implements Rule
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
        return (new ColorShortHex())->passes($attribute, $value)
            || (new ColorLongHex())->passes($attribute, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The given value is not a valid hex color.';
    }
}
