<?php

# For PHP7
// declare(strict_types=1);

// namespace Hug\Tests\String;

use PHPUnit\Framework\TestCase;

use Hug\HString\HString as HString;

/**
 *
 */
final class HStringTest extends TestCase
{    
    public $string1 = null;
    public $string2 = null;

    function setUp(): void
    {
        $this->string1 = 'Bonjour le monde ! Bonjour la vie ! Bonjour les autres !';
        $this->string2 = 'Il fait de plus en plus chaud ...';
    }

    /* ************************************************* */
    /* ************ HString::str_replace_last ********** */
    /* ************************************************* */

    /**
     *
     */
    public function testCanReplaceLast()
    {
        $test = HString::str_replace_last('Bonjour', 'Hello', $this->string1);
        $this->assertIsString($test);
        $this->assertStringContainsString('Hello', $test);
    }

    /**
     *
     */
    public function testCannotReplaceLast()
    {
        $test = HString::str_replace_last('Au revoir', 'Hello', $this->string1);
        $this->assertIsString($test);
        $this->assertStringNotContainsString('Hello', $test);
    }

    /* ************************************************* */
    /* *************** HString::starts_with ************ */
    /* ************************************************* */

    /**
     *
     */
    public function testCanSartWith()
    {
        $test = HString::starts_with($this->string1, 'Bonjour');
        $this->assertIsBool($test);
        $this->assertTrue($test);
    }

    /**
     *
     */
    public function testCannotSartWith()
    {
        $test = HString::starts_with($this->string1, 'Au revoir');
        $this->assertIsBool($test);
        $this->assertFalse($test);
    }

    /* ************************************************* */
    /* *************** HString::ends_with ************** */
    /* ************************************************* */

    /**
     *
     */
    public function testCanEndWith()
    {
        $test = HString::ends_with($this->string1, 'les autres !');
        $this->assertIsBool($test);
        $this->assertTrue($test);
    }

    /**
     *
     */
    public function testCannotEndWith()
    {
        $test = HString::ends_with($this->string1, 'les autres');
        $this->assertIsBool($test);
        $this->assertFalse($test);
    }


}

