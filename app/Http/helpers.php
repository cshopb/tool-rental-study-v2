<?php

/**
 * Created by PhpStorm.
 * User: dragokin
 * Date: 09/07/15
 * Time: 19:27
 * @param $path
 * @param string $active
 * @return string
 */

function set_active($path, $active = 'active')
{
    if (Request::is($path) || Request::is($path . '/*'))
    {
        return $active;
    } else
    {
        return '';
    }
}