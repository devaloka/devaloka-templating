<?php
/**
 * Templating Aware Trait
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2015 Whizark.
 * @license MIT
 */

namespace Devaloka\Templating;

/**
 * Class TemplatingAwareTrait
 *
 * @package Devaloka\Templating
 */
trait TemplatingAwareTrait
{
    /**
     * @var TemplatingInterface
     */
    protected $templating;

    /**
     * @param TemplatingInterface $templating
     */
    public function setTemplating(TemplatingInterface $templating)
    {
        $this->templating = $templating;
    }
}
