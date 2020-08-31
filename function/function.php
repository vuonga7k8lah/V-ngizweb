<?php
// Cat chu~ de hien thi thanh doan van ngan.
function the_excerpt($text, $string = 400) {
    $sanitized = htmlentities($text, ENT_COMPAT, 'UTF-8');
    if(strlen($sanitized) > $string) {
        $cutString = substr($sanitized,0,$string);
        $words = substr($sanitized, 0, strrpos($cutString, ' '));
        return $words;
    } else {
        return $sanitized;
    }

}