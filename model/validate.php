<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 1/26/2018
 * Time: 11:09 AM
 */

/**
 * Validate a color
 *
 * @param String color
 * @return boolean
 */

function validColor($color) {
    global $f3;
    return in_array($color, $f3->get('colors'));
}

function validString($string) {
    if($string != null && ctype_alpha($string)) {
        return true;
    }
}

