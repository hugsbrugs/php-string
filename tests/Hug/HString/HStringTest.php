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

    function __construct()
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
        $this->assertInternalType('string', $test);
        $this->assertContains('Hello', $test);
    }

    /**
     *
     */
    public function testCannotReplaceLast()
    {
        $test = HString::str_replace_last('Au revoir', 'Hello', $this->string1);
        $this->assertInternalType('string', $test);
        $this->assertNotContains('Hello', $test);
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
        $this->assertInternalType('boolean', $test);
        $this->assertTrue($test);
    }

    /**
     *
     */
    public function testCannotSartWith()
    {
        $test = HString::starts_with($this->string1, 'Au revoir');
        $this->assertInternalType('boolean', $test);
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
        $this->assertInternalType('boolean', $test);
        $this->assertTrue($test);
    }

    /**
     *
     */
    public function testCannotEndWith()
    {
        $test = HString::ends_with($this->string1, 'les autres');
        $this->assertInternalType('boolean', $test);
        $this->assertFalse($test);
    }


}

