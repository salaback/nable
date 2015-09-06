<?php


namespace app\Helpers;


class Cleaner
{
    /**
     * @param string $name
     * @return string
     */
    static function name($name)
    {
        $cleanName = strtolower(str_replace(' ', '_', (preg_replace('/[^a-zA-Z0-9_ -%][().][\/]/s', '', $name))));

        return $cleanName ;

    }
}