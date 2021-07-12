<?php


namespace App\Helper;


class StringHelper
{

    /**
     * Return an camel case string
     *
     * @param string $word
     * @return string
     */
    public static function toCamelCase(string $word): string
    {
        return lcfirst(str_replace(' ', '', ucwords(strtr($word, '_-', '  '))));
    }

    /**
     * Return an upper camel case string
     *
     * @param string $word
     * @return string
     */
    public static function upperCamelCase(string $word): string
    {
        return ucfirst(static::toCamelCase($word));
    }

}
