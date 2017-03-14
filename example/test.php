<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Hug\HString\HString as HString;

$string1 = 'Bonjour le monde ! Bonjour la vie ! Bonjour les autres !';

/* ************************************************* */
/* ************ HString::str_replace_last ********** */
/* ************************************************* */

error_log('Before str_replace_last ' . $string1);
$test = HString::str_replace_last('Bonjour', 'Hello', $string1);
error_log('After str_replace_last ' . $test);
error_log("\n");

error_log('Before str_replace_last ' . $string1);
$test = HString::str_replace_last('Au revoir', 'Hello', $string1);
error_log('After str_replace_last ' . $test);
error_log("\n");

/* ************************************************* */
/* *************** HString::starts_with ************ */
/* ************************************************* */

error_log('Before starts_with ' . $string1 . ' ? Bonjour');
$test = HString::starts_with($string1, 'Bonjour');
error_log('After starts_with ' . $test);
error_log("\n");

error_log('Before starts_with ' . $string1 . ' ? Au revoir');
$test = HString::starts_with($string1, 'Au revoir');
error_log('After starts_with ' . $test);
error_log("\n");

/* ************************************************* */
/* *************** HString::ends_with ************** */
/* ************************************************* */

error_log('Before ends_with ' . $string1 . ' ? les autres !');
$test = HString::ends_with($string1, 'les autres !');
error_log('After ends_with ' . $test);
error_log("\n");

error_log('Before ends_with ' . $string1 . ' ? les autres');
$test = HString::ends_with($string1, 'les autres');
error_log('After ends_with ' . $test);
error_log("\n");
