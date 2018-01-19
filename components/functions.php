<?php
/**
 * Created by PhpStorm.
 * User: Миша
 * Date: 21.03.2016
 * Time: 4:25
 */


/**
 * @param $text string Text
 * @param $length int Final length
 * @return string
 */
function shortText($text, $length) {

    if (strlen($text) <= $length) return $text;
    $string = strip_tags($text);
    $string = substr($string, 0, $length);
    $string = rtrim($string, "!,.-");
    $string = substr($string, 0, strrpos($string, ' '))."...";
    return $string;
}

