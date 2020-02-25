# Validate colors with Laravel 5+
[![Latest Version](https://img.shields.io/github/release/scybulski/laravel-validator-color.svg?style=flat-square)](https://github.com/scybulski/laravel-validator-color/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://travis-ci.org/scybulski/laravel-validator-color.svg?branch=master)](https://travis-ci.org/scybulski/laravel-validator-color)
[![Total Downloads](https://img.shields.io/packagist/dt/scybulski/laravel-validator-color.svg?style=flat-square)](https://packagist.org/packages/scybulski/laravel-validator-color)

This package will let you validate that a certain value is a valid CSS color string.

## Installation

Install via [composer](https://getcomposer.org/) - In the terminal:
```bash
composer require scybulski/laravel-validator-color
```

## Usage
You can use this package either by passing strings to Validator or using Rule Objects.
### Validator strings
You need to register a service provider by adding the following to the `providers` array in your `config/app.php`
```php
scybulski\Validator\Color\ServiceProvider::class
```
Then you can use the rules in a Controller or Form Request as following.
```php
use Illuminate\Foundation\Http\FormRequest;

class MyClass extends FormRequest
{
    public function rules()
    {
        return [
            'color'           => 'required|other_rule|color',
            'color_hex'       => 'required|other_rule|color_hex',
            'color_keyword'   => 'required|other_rule|color_keyword',
            'color_long_hex'  => 'required|other_rule|color_long_hex',
            'color_rgb'       => 'required|other_rule|color_rgb',
            'color_rgba'      => 'required|other_rule|color_rgba',
            'color_rgb_any'   => 'required|other_rule|color_rgb_any',
            'color_short_hex' => 'required|other_rule|color_short_hex',
        ];
    }
}
```
### Rule Objects
You can define validation rules in a Controller or Form Request as following.
```php
use Illuminate\Foundation\Http\FormRequest;
use scybulski\Validator\Color\Rules\Color;
use scybulski\Validator\Color\Rules\ColorHex;
use scybulski\Validator\Color\Rules\ColorKeyword;
use scybulski\Validator\Color\Rules\ColorLongHex;
use scybulski\Validator\Color\Rules\ColorRgb;
use scybulski\Validator\Color\Rules\ColorRgba;
use scybulski\Validator\Color\Rules\ColorRgbAny;
use scybulski\Validator\Color\Rules\ColorShortHex;

class MyClass extends FormRequest
{
    public function rules()
    {
        return [
            'color'           => ['required', 'other_rule', new Color],
            'color_hex'       => ['required', 'other_rule', new ColorHex],
            'color_keyword'   => ['required', 'other_rule', new ColorKeyword],
            'color_long_hex'  => ['required', 'other_rule', new ColorLongHex],
            'color_rgb'       => ['required', 'other_rule', new ColorRgb],
            'color_rgba'      => ['required', 'other_rule', new ColorRgba],
            'color_rgb_any'   => ['required', 'other_rule', new ColorRgbAny],
            'color_short_hex' => ['required', 'other_rule', new ColorShortHex],
        ];
    }
}
```