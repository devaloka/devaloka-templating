<?php
/**
 * Devaloka Templating Template API.
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2015 Whizark.
 * @license MIT
 */

if (!function_exists('devaloka_tpl')) {
    /**
     * @return \Devaloka\Templating\TemplatingInterface|\Devaloka\Common\NullObject
     */
    function devaloka_tpl()
    {
        return devaloka_get('templating');
    }
}

if (!function_exists('deva_tpl')) {
    /**
     * @see devaloka_tpl() :alias:
     *
     * @return \Devaloka\Templating\TemplatingInterface|\Devaloka\Common\NullObject
     */
    function deva_tpl()
    {
        return devaloka_tpl();
    }
}

if (!function_exists('dl_tpl')) {
    /**
     * @see devaloka_tpl() :alias:
     *
     * @return \Devaloka\Templating\TemplatingInterface|\Devaloka\Common\NullObject
     */
    function dl_tpl()
    {
        return devaloka_tpl();
    }
}
