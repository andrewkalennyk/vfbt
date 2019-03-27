<?php

//get translate
if (! function_exists('__')) {
    function __($phrase)
    {
        return \App\Models\Translation::getTranslate($phrase);
    }
}

if (! function_exists('dr')) {
    /**
     * @param $array
     */
    function dr($array)
    {
        echo '<pre>';
        die(print_r($array));
    }
}