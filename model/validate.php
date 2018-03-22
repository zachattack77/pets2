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

/**
 * Validate a string
 *
 * @param $string
 * @return bool
 */
function validString($string) {
    if(!empty($string) && is_string($string))
    {
        return true;
    }
    else {
        return false;
    }
}

$errors = array();


$success = false;
if(!validColor($color)) {
    $errors['color'] = "Please enter a valid color";
}
elseif (!validString($name)){
    $errors['name'] = "Please enter a valid name";
}
elseif (!validString($type)){
    $errors['type'] = "Please enter a valid type";
} else {
    $success = true;
}

