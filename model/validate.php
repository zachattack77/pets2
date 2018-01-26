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
    if($string != null && ctype_alpha($string)) {
        return true;
    }
}

$errors = array();

if(!validColor($color)) {
    $errors['color'] = "Please enter a valid color.";
}
if(!validString($string)) {
    $errors['type'] = "Please enter a valid type of pet";
    $errors['name'] = "Please enter a valid name";
}

$success = sizeof($errors) == 0;

