<?php


namespace baitap\core;


class URL
{
    /**
     * @param string $path
     *
     * @return string
     */
    public static function uri($path = '') {
        if (empty($path)) {
            return App::get('config/app')['homeURL'];
        }

        return App::get('config/app')['homeURL'] . ltrim($path, '/');
    }
}