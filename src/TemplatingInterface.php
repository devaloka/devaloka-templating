<?php
/**
 * Templating Interface
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2015 Whizark.
 * @license MIT
 */

namespace Devaloka\Templating;

/**
 * Class TemplatingInterface
 *
 * @package Devaloka\Templating
 */
interface TemplatingInterface
{
    public function partial($slug, $name = null, array $vars = []);

    public function partialOnly($slug, $name = null, array $vars = []);
}
