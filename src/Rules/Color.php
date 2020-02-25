<?php

namespace scybulski\Validator\Color\Rules;

use Illuminate\Contracts\Validation\Rule;

class Color implements Rule
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
        return (new ColorHex())->passes($attribute, $value)
            || (new ColorKeyword())->passes($attribute, $value)
            || (new ColorRgbAny())->passes($attribute, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The given value is not a valid color.';
    }
}
