<?php
/**
 * Templating
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2015 Whizark.
 * @license MIT
 * @license GPL-2.0
 * @license GPL-3.0
 */

namespace Devaloka\Templating;

/**
 * Class Templating
 *
 * @package Devaloka\Templating
 */
class Templating implements InjectableTemplatingInterface
{
    protected $globals = [];

    protected $variables = [];

    /**
     * @param string $slug
     * @param string|null $name
     * @param mixed[] $vars
     *
     * @return bool
     */
    public function partial($slug, $name = null, array $vars = [])
    {
        $templateFile = $this->getTemplate($slug, $name);

        if ($templateFile === '') {
            return false;
        }

        $defaultVars = $this->getWordPressGlobals();
        $defaultVars = array_merge($defaultVars, $this->globals);
        $defaultVars = array_merge($defaultVars, $this->variables);
        $vars        = array_merge($defaultVars, $vars);
        $environment = $this->createEnvironment($slug, $name);

        call_user_func($environment, $templateFile, $vars);
    }

    public function getTemplate($slug, $name = null)
    {
        do_action('get_template_part_' . $slug, $slug, $name);

        $templates = [];
        $name      = (string) $name;

        if ($name !== '') {
            $templates[] = $slug . '-' . $name . '.php';
        }

        $templates[]  = $slug . '.php';
        $templateFile = locate_template($templates, false, false);
        $templateFile = apply_filters('devaloka_tpl_partial', $templateFile);
        $templateFile = apply_filters('devaloka_tpl_partial_' . $slug, $templateFile, $slug, $name);

        return $templateFile;
    }

    protected function getWordPressGlobals()
    {
        global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

        $globals = compact(
            [
                'posts',
                'post',
                'wp_did_header',
                'wp_query',
                'wp_rewrite',
                'wpdb',
                'wp_version',
                'wp',
                'id',
                'comment',
                'user_ID',
            ]
        );

        if (is_array($wp_query->query_vars)) {
            foreach ($wp_query->query_vars as $name => $value) {
                if (array_key_exists($name, $globals)) {
                    continue;
                }

                $globals[$name] = $value;
            }
        }

        if (array_key_exists('s', $globals)) {
            $globals['s'] = esc_attr($globals['s']);
        }

        return $globals;
    }

    protected function createEnvironment($slug, $name)
    {
        $_slug = $slug;
        $_name = $name;

        return function ($_template_file, $_vars) use ($_slug, $_name) {
            extract($_vars, EXTR_SKIP);

            do_action('devaloka_tpl_partial_before');
            do_action('devaloka_tpl_partial_before_' . $_slug, $_slug, $_name, $_template_file, $_vars);

            require $_template_file;

            do_action('devaloka_tpl_partial_after_' . $_slug, $_slug, $_name, $_template_file, $_vars);
            do_action('devaloka_tpl_partial_after');
        };
    }

    /**
     * @param string $slug
     * @param string|null $name
     * @param mixed[] $vars
     *
     * @return bool
     */
    public function partialOnly($slug, $name = null, array $vars = [])
    {
        $templateFile = $this->getTemplate($slug, $name);

        if ($templateFile === '') {
            return false;
        }

        $vars        = array_merge($this->variables, $vars);
        $environment = $this->createEnvironment($slug, $name);

        call_user_func($environment, $templateFile, $vars);
    }

    public function injectGlobals()
    {
        array_merge($GLOBALS, $this->globals);
    }

    public function registerGlobal($name, $value)
    {
        $this->globals[$name] = $value;
    }

    public function registerVariable($name, $value)
    {
        $this->variables[$name] = $value;
    }
}
