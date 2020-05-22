<?php

// Check if the function exists first to avoid collision, I made a really basic version of your function...

if (! function_exists('pastTense')) {
    function pastTense($value) {
    if ($value == strtolower('open')) {
        return $value.'ed';
    }
    if ($value == strtolower('close')) {
        return $value.'d';
    }
    return false;
    }
}
