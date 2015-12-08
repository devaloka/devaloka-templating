<?php
/**
 * TemplatingAwareInterface
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2015 Whizark.
 * @license MIT
 */

namespace Devaloka\Templating;

/**
 * Class TemplatingAwareInterface
 *
 * @package Devaloka\Templating
 */
interface TemplatingAwareInterface
{
    public function setTemplating(TemplatingInterface $templating);
}
