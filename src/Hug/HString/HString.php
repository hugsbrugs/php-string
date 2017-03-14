<?php

namespace Hug\HString;

/**
 *
 */
class HString
{
	/**
	* Replace the last occurrence of a string
	*
	* @param string $search
	* @param string $replace
	* @param string $subject
	*
	* @return string
	*
	*/
	public static function str_replace_last($search, $replace, $subject)
	{ 
	    $length_of_search = strlen( $search );
	    $position_of_search = strrpos( $subject, $search );
        if($position_of_search!==false)
        {
    	    $subject = substr_replace($subject, $replace, $position_of_search, $length_of_search );
        }
        return $subject;
	}

	/**
     * Checks whether a string starts with given chars
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool starts_with
     *
     */
    public static function starts_with($haystack, $needle)
    {
         $length = strlen($needle);
         return (substr($haystack, 0, $length) === $needle);
    }

    /**
     * Checks whether a string ends with given chars
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool ends_with
     *
     */
    public static function ends_with($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0)
        {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

}
