<?php

namespace scybulski\Validator\Color\Rules;

use Illuminate\Contracts\Validation\Rule;

class ColorRgbAny implements Rule
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
        return (new ColorRgb())->passes($attribute, $value)
            || (new ColorRgba())->passes($attribute, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The given value is not a valid RGB color.';
    }
}
