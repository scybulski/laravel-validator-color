<?php

namespace scybulski\Validator\Color\Tests;

use scybulski\Validator\Color\Rules\Color;
use scybulski\Validator\Color\Rules\ColorHex;
use scybulski\Validator\Color\Rules\ColorKeyword;
use scybulski\Validator\Color\Rules\ColorLongHex;
use scybulski\Validator\Color\Rules\ColorRgb;
use scybulski\Validator\Color\Rules\ColorRgba;
use scybulski\Validator\Color\Rules\ColorRgbAny;
use scybulski\Validator\Color\Rules\ColorShortHex;

class ColorRulesTest extends TestCase
{
    public function testRuleColor()
    {
        $this->assertTrue(  (new Color())->passes('someAttribute', 'white'));
        $this->assertTrue(  (new Color())->passes('someAttribute', 'rgba(4,200,100,0)'));
        $this->assertTrue(  (new Color())->passes('someAttribute', 'rgb(4,200,100)'));
        $this->assertTrue(  (new Color())->passes('someAttribute', '#37F'));
        $this->assertTrue(  (new Color())->passes('someAttribute', '#37FFFF'));
        $this->assertFalse( (new Color())->passes('someAttribute', 'fakecolor!'));
    }

    public function testRuleColorAsHex()
    {
        $this->assertFalse( (new ColorHex())->passes('someAttribute', 'white'));
        $this->assertFalse( (new ColorHex())->passes('someAttribute', 'rgba(4,200,100,0)'));
        $this->assertFalse( (new ColorHex())->passes('someAttribute', 'rgb(4,200,100)'));
        $this->assertTrue(  (new ColorHex())->passes('someAttribute', '#37F'));
        $this->assertTrue(  (new ColorHex())->passes('someAttribute', '#37FFFF'));
        $this->assertFalse( (new ColorHex())->passes('someAttribute', 'fakecolor!'));
    }

    public function testRuleColorAsKeyword()
    {
        $this->assertTrue(  (new ColorKeyword())->passes('someAttribute', 'white'));
        $this->assertFalse( (new ColorKeyword())->passes('someAttribute', 'rgba(4,200,100,0)'));
        $this->assertFalse( (new ColorKeyword())->passes('someAttribute', 'rgb(4,200,100)'));
        $this->assertFalse( (new ColorKeyword())->passes('someAttribute', '#37F'));
        $this->assertFalse( (new ColorKeyword())->passes('someAttribute', '#37FFFF'));
        $this->assertFalse( (new ColorKeyword())->passes('someAttribute', 'fakecolor!'));
    }

    public function testRuleColorAsLongHex()
    {
        $this->assertFalse( (new ColorLongHex())->passes('someAttribute', 'white'));
        $this->assertFalse( (new ColorLongHex())->passes('someAttribute', 'rgba(4,200,100,0)'));
        $this->assertFalse( (new ColorLongHex())->passes('someAttribute', 'rgb(4,200,100)'));
        $this->assertFalse( (new ColorLongHex())->passes('someAttribute', '#37F'));
        $this->assertTrue(  (new ColorLongHex())->passes('someAttribute', '#37FFFF'));
        $this->assertFalse( (new ColorLongHex())->passes('someAttribute', 'fakecolor!'));
    }

    public function testRuleColorAsRgb()
    {
        $this->assertFalse( (new ColorRgb())->passes('someAttribute', 'white'));
        $this->assertFalse( (new ColorRgb())->passes('someAttribute', 'rgba(4,200,100,0)'));
        $this->assertTrue(  (new ColorRgb())->passes('someAttribute', 'rgb(4,200,100)'));
        $this->assertFalse( (new ColorRgb())->passes('someAttribute', '#37F'));
        $this->assertFalse( (new ColorRgb())->passes('someAttribute', '#37FFFF'));
        $this->assertFalse( (new ColorRgb())->passes('someAttribute', 'fakecolor!'));
    }

    public function testRuleColorAsRgba()
    {
        $this->assertFalse( (new ColorRgba())->passes('someAttribute', 'white'));
        $this->assertTrue(  (new ColorRgba())->passes('someAttribute', 'rgba(4,200,100,0)'));
        $this->assertFalse( (new ColorRgba())->passes('someAttribute', 'rgb(4,200,100)'));
        $this->assertFalse( (new ColorRgba())->passes('someAttribute', '#37F'));
        $this->assertFalse( (new ColorRgba())->passes('someAttribute', '#37FFFF'));
        $this->assertFalse( (new ColorRgba())->passes('someAttribute', 'fakecolor!'));
    }

    public function testRuleColorAsRgbAny()
    {
        $this->assertFalse( (new ColorRgbAny())->passes('someAttribute', 'white'));
        $this->assertTrue(  (new ColorRgbAny())->passes('someAttribute', 'rgba(4,200,100,0)'));
        $this->assertTrue(  (new ColorRgbAny())->passes('someAttribute', 'rgb(4,200,100)'));
        $this->assertFalse( (new ColorRgbAny())->passes('someAttribute', '#37F'));
        $this->assertFalse( (new ColorRgbAny())->passes('someAttribute', '#37FFFF'));
        $this->assertFalse( (new ColorRgbAny())->passes('someAttribute', 'fakecolor!'));
    }

    public function testRuleColorAsShortHex()
    {
        $this->assertFalse( (new ColorShortHex())->passes('someAttribute', 'white'));
        $this->assertFalse( (new ColorShortHex())->passes('someAttribute', 'rgba(4,200,100,0)'));
        $this->assertFalse( (new ColorShortHex())->passes('someAttribute', 'rgb(4,200,100)'));
        $this->assertTrue(  (new ColorShortHex())->passes('someAttribute', '#37F'));
        $this->assertFalse( (new ColorShortHex())->passes('someAttribute', '#37FFFF'));
        $this->assertFalse( (new ColorShortHex())->passes('someAttribute', 'fakecolor!'));
    }
}
