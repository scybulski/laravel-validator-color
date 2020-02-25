<?php

namespace scybulski\Validator\Color;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use scybulski\Validator\Color\Rules\Color;
use scybulski\Validator\Color\Rules\ColorHex;
use scybulski\Validator\Color\Rules\ColorKeyword;
use scybulski\Validator\Color\Rules\ColorLongHex;
use scybulski\Validator\Color\Rules\ColorRgb;
use scybulski\Validator\Color\Rules\ColorRgba;
use scybulski\Validator\Color\Rules\ColorRgbAny;
use scybulski\Validator\Color\Rules\ColorShortHex;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->resolving('validator', function ($factory, $app) {

            $factory->extend('color', function ($attribute, $value, $parameters, $validator) {
                return (new Color())->passes($attribute, $value);
            });

            $factory->extend('color_hex', function ($attribute, $value, $parameters, $validator) {
                return (new ColorHex())->passes($attribute, $value);
            });

            $factory->extend('color_short_hex', function ($attribute, $value, $parameters, $validator) {
                return (new ColorShortHex())->passes($attribute, $value);
            });

            $factory->extend('color_long_hex', function ($attribute, $value, $parameters, $validator) {
                return (new ColorLongHex())->passes($attribute, $value);
            });

            $factory->extend('color_rgb', function ($attribute, $value, $parameters, $validator) {
                return (new ColorRgb())->passes($attribute, $value);
            });

            $factory->extend('color_rgba', function ($attribute, $value, $parameters, $validator) {
                return (new ColorRgba())->passes($attribute, $value);
            });

            $factory->extend('color_rgb_any', function ($attribute, $value, $parameters, $validator) {
                return (new ColorRgbAny())->passes($attribute, $value);
            });

            $factory->extend('color_keyword', function ($attribute, $value, $parameters, $validator) {
                return (new ColorKeyword())->passes($attribute, $value);
            });
        });
    }
}
