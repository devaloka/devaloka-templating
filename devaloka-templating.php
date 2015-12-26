<?php
/*
Plugin Name: Devaloka Templating
Description: A partial template loader for WordPress
Version: 0.2.1
Author: Whizark
Author URI: http://whizark.com
License: GPL-2.0+
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: devaloka-templating
Domain Path: /languages
Network: true
*/

if (!defined('ABSPATH')) {
    exit;
}

use Devaloka\Templating\Provider\TemplatingProvider;

/** @var Devaloka\Devaloka $devaloka */
call_user_func(
    function () use ($devaloka) {
        $container = $devaloka->getContainer();

        /** @var Composer\Autoload\ClassLoader $loader */
        $loader = $container->get('loader');

        $loader->addPsr4('Devaloka\\Templating\\', __DIR__ . '/src/', true);

        $devaloka->register(new TemplatingProvider());
    }
);

require 'includes/api.php';
