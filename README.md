# Devaloka Templating

A partial template loader for WordPress as just a better replacement of
```get_template_part()```.

## Features

*   Including a partial template as a new lexical environment
*   Passing/Injecting variable(s) into a partial template
*   Injecting global variable(s) into a WordPress template

## Requirements

*   [Devaloka](https://github.com/devaloka/devaloka)

## Installation

1.  Install via Composer.

    ```sh
    composer require devaloka/devaloka-templating
    ```

2.  Move `loader/10-devaloka-templating-loader.php` into
    `<ABSPATH>wp-content/mu-plugins/`.
