<?php
/**
 * Injectable Templating Interface
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2015 Whizark.
 * @license MIT
 */

namespace Devaloka\Templating;

/**
 * Class InjectableTemplatingInterface
 *
 * @package Devaloka\Templating
 */
interface InjectableTemplatingInterface extends TemplatingInterface
{
    public function injectGlobals();
}
