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

    /**
     * Find the position of the Xth occurrence of a substring in a string
     * @param $haystack
     * @param $needle
     * @param $number integer > 0
     * @return int
     */
    public static function strposX($haystack, $needle, $number)
    {
        if($number == '1')
        {
            return strpos($haystack, $needle);
        }
        elseif($number > '1')
        {
            return strpos($haystack, $needle, strposX($haystack, $needle, $number - 1) + strlen($needle));
        }
        else
        {
            return error_log('Error: Value for parameter $number is out of range');
        }
    }

    /**
     * Replace accented characters in string by non-accented
     *
     * @param string $str
     *
     * @return string $string without accents
     *
     * @todo To be really hard tested for reliability ...
     */
    public static function remove_accents($str)
    {
        $string = strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), utf8_decode('aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY'));
        return $string;
    }

    /**
     * Test if a string contains utf8mb4 characters meaning chars encoded on 4 bytes
     *
     * @param string $str
     *
     * @return bool $is_utf8mb4
     *
     * @link https://stackoverflow.com/questions/16496554/can-php-detect-4-byte-encoded-utf8-chars
     */
    public static function is_utf8mb4($string)
    {
        if (max(array_map('ord', str_split($string))) >= 240){
            return true;
        }
        return false;
    }


    /**
     * Nettoye un texte
     *
     * @param string $str string to be cleaned
     * @param string $encoding String encoding (default UTF-8)
     *
     * @return string $str Cleaned string
     *
     * @todo rename function : find where it is used / make subfunctions ...
     *
     */
    /*public static function suppr_accents($str, $encoding = 'utf-8')
    {
        // transformer les caractères accentués en entités HTML
        $str = htmlentities($str, ENT_NOQUOTES, $encoding); 
        
        $str = str_replace(array("\n", chr(10), chr(13)), ' ', $str);
        
        // remplacer les entités HTML pour avoir juste le premier caractères non accentués
        // Exemple : "&ecute;" => "e", "&Ecute;" => "E", "Ã " => "a" ...
        $str = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        
        // Remplacer les ligatures tel que : Œ, Æ ...
        // Exemple "Å“" => "oe"
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
        
        // Supprimer tout le reste
        $str = preg_replace('#&[^;]+;#', '', $str);
        $str = str_replace(array('.', ',', '...', ';', '_', '/', "'",' ', '"', '!', ':'), '-', $str);
        $str = str_replace(array('--', '---', '----', ';', '_', '/', "'"), '-', $str);
        
        
        // Supprimer les espaces et les remplacer par des tirets
        $str = str_replace(' ', '-', $str);
        
        return $str;
    }*/

    /**
     * Trims text to a space then adds ellipses if desired
     *
     * @param string $input text to trim
     * @param int $length length in characters to trim to
     * @param bool $ellipses if ellipses (...) are to be added
     * @param bool $strip_html if html tags are to be stripped
     *
     * @return string $trimmed_text the trimmed text
     *
     */
    /*function trim_text($input, $length, $ellipses = TRUE, $strip_html = TRUE)
    {
        # strip tags, if desired
        if ($strip_html)
        {
            $input = str_replace("</h2>", " ", $input);
            $input = strip_tags($input);
        }
      
        # no need to trim, already shorter than trim length
        if (strlen($input) <= $length)
        {
            return $input;
        }
      
        # find last space within length
        $last_space = strrpos(substr($input, 0, $length), ' ');
        $trimmed_text = substr($input, 0, $last_space);
      
        # add ellipses (...)
        if ($ellipses)
        {
            $trimmed_text .= '...';
        }
      
        return $trimmed_text;
    }*/

    /**
     * Trims word to a space then adds ellipses if desired
     *
     * @param string $input text to trim
     * @param int $length length in words to trim to
     * @param bool $ellipses if ellipses (...) are to be added
     * @param bool $strip_html if html tags are to be stripped
     *
     * @return string $trimmed_text the trimmed text
     *
     */
    /*function trim_word($input, $length, $ellipses = TRUE, $strip_html = TRUE)
    {
        $output = "";
        # strip tags, if desired
        if ($strip_html)
        {
            $input = str_replace("</h2>", " ", $input);
            $input = strip_tags($input);
        }

        $input_array = explode(" ", $input);
        if(count($input_array) > $length)
        {
            $input_array = array_slice($input_array, 0, $length);
            $output = implode(" ", $input_array);
        }

        # add ellipses (...)
        if ($ellipses)
        {
            $output .= ' ...';
        }
      
        return $output;
    }*/

    /*function take_words_randomly($text, $words_count)
    {
        $output = "";
        $text_array = explode(" ", $text);
        # Remove empty elements from array
        $text_array = array_filter(array_map('trim', $text_array));
        # Reorder array indexes
        $text_array = array_values($text_array);
        $pos_to_extract = rand(0, count($text_array)-$words_count-1);
        for($i=$pos_to_extract; $i<($pos_to_extract+$words_count); $i++)
        {
            if(isset($text_array[$i]))
            {
                $output .= $text_array[$i]." ";
            }
            else
            {
                error_log("Problème à corriger dans utils -> take_words_randomly ");
            }
        }
        $output = trim($output);
        return $output;
    }

    function insert_words_randomly($text, $text_to_insert)
    {
        $output = "";
        $text_array = explode(" ", $text);
        $text_to_insert_array = explode(" ", $text_to_insert);
        $pos_to_insert = rand(0, count($text_array));
        $text_array = array_insert($text_array, $text_to_insert_array, $pos_to_insert);
        $output = implode(" ", $text_array);
        return $output;
    }*/
}
