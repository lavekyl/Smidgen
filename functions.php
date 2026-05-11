<?php

/**
 * Smidgen theme functions.
 *
 * @package Smidgen
 */

if (! defined('ABSPATH')) {
  exit;
}

/**
 * Set up theme defaults and register support for various WordPress features.
 */
function smidgen_setup()
{
  add_theme_support('wp-block-styles');
  add_theme_support('responsive-embeds');
  add_theme_support('editor-styles');
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
      'navigation-widgets',
    )
  );

  // Load SmidgenCSS and theme styles into the block editor so previews
  // match the frontend.
  add_editor_style('assets/css/smidgen.min.css');
  add_editor_style('assets/css/style.css');
}
add_action('after_setup_theme', 'smidgen_setup');

/**
 * Register the SmidgenCSS stylesheet handle early so the Smidgen Blocks
 * plugin defers to this theme's copy of the framework.
 *
 * The plugin checks for this handle at "init" priority 10. Registering at
 * priority 5 ensures our version wins and the plugin skips its own
 * registration.
 */
function smidgen_register_framework_style()
{
  wp_register_style(
    'smidgen-css',
    get_theme_file_uri('assets/css/smidgen.min.css'),
    array(),
    wp_get_theme()->get('Version')
  );
}
add_action('init', 'smidgen_register_framework_style', 5);

/**
 * Enqueue front-end styles.
 *
 * SmidgenCSS loads first, then the theme's component styles which depend on it.
 */
function smidgen_enqueue_styles()
{
  wp_enqueue_style('smidgen-css');

  wp_enqueue_style(
    'smidgen-theme',
    get_theme_file_uri('assets/css/style.css'),
    array('smidgen-css'),
    wp_get_theme()->get('Version')
  );
}
add_action('wp_enqueue_scripts', 'smidgen_enqueue_styles');
