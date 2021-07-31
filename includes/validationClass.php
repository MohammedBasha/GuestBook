<?php

class validationClass
{
    public static function validateMail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validateLength($str, $length, $compare = '<') {
        if ($compare == '<') {
            return strlen($str) < $length;
            return false;
        } elseif ($compare == '>') {
            return strlen($str) > $length;
            return false;
        }
        return false;
    }
}