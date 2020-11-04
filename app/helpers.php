<?php

function getLengthString($string, $length)
{
    $string = strip_tags($string);
    $string = mb_substr($string, 0, $length);
    $string = rtrim($string, "!,.-");
    $string = mb_substr($string, 0, strrpos($string, ' '));

    return $string . '...';
}

/**
 * mb_ucfirst - преобразует первый символ в верхний регистр
 * @param string $str - строка
 * @param string $encoding - кодировка, по-умолчанию UTF-8
 * @return string
 */
function mb_ucfirst($str, $encoding = 'UTF-8')
{
    $str = mb_ereg_replace('^[\ ]+', '', $str);
    $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding) .
        mb_substr($str, 1, mb_strlen($str), $encoding);
    return $str;
}