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

/**
 * Check GitHub Releases for theme updates.
 *
 * Triggered by the "Update URI: https://github.com/..." header in style.css.
 * WordPress derives the filter name from the URI's hostname, so this hooks
 * into update_themes_github.com. Returning a populated array tells WordPress
 * an update is available; returning the incoming $update value lets WordPress
 * fall through normally.
 *
 * @param array|false $update            The theme update data.
 * @param array       $theme_data        Theme headers.
 * @param string      $theme_stylesheet  Directory name of the theme.
 * @param array       $locales           Installed locales.
 * @return array|false
 */
function smidgen_check_theme_updates($update, $theme_data, $theme_stylesheet, $locales)
{
  if ('smidgen' !== $theme_stylesheet) {
    return $update;
  }

  $remote = get_transient('smidgen_theme_update_check');

  if (false === $remote) {
    $response = wp_remote_get(
      'https://api.github.com/repos/lavekyl/Smidgen/releases/latest',
      array(
        'timeout' => 10,
        'headers' => array('Accept' => 'application/vnd.github+json'),
      )
    );

    if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
      return $update;
    }

    $remote = json_decode(wp_remote_retrieve_body($response));
    set_transient('smidgen_theme_update_check', $remote, 12 * HOUR_IN_SECONDS);
  }

  if (empty($remote->tag_name) || empty($remote->assets[0]->browser_download_url)) {
    return $update;
  }

  return array(
    'theme'        => 'smidgen',
    'new_version'  => ltrim($remote->tag_name, 'v'),
    'url'          => 'https://github.com/lavekyl/Smidgen',
    'package'      => $remote->assets[0]->browser_download_url,
    'requires'     => '6.4',
    'requires_php' => '7.4',
  );
}
add_filter('update_themes_github.com', 'smidgen_check_theme_updates', 10, 4);

/**
 * Populate the theme details modal that opens from the theme update notice.
 *
 * Without this, the modal would attempt to fetch info from wordpress.org and
 * fail. We provide the basic info from the cached GitHub release data.
 *
 * @param false|object|array $result Default response.
 * @param string             $action The type of information being requested.
 * @param object             $args   Theme API arguments.
 * @return false|object|array
 */
function smidgen_themes_api_filter($result, $action, $args)
{
  if ('theme_information' !== $action) {
    return $result;
  }

  if (empty($args->slug) || 'smidgen' !== $args->slug) {
    return $result;
  }

  $remote = get_transient('smidgen_theme_update_check');

  if (false === $remote || empty($remote->tag_name)) {
    return $result;
  }

  $info                = new stdClass();
  $info->name          = 'Smidgen';
  $info->slug          = 'smidgen';
  $info->version       = ltrim($remote->tag_name, 'v');
  $info->author        = '<a href="https://smidgencss.com">Kyle Lavery</a>';
  $info->homepage      = 'https://github.com/lavekyl/Smidgen';
  $info->download_link = $remote->assets[0]->browser_download_url ?? '';
  $info->sections      = array(
    'description' => 'A featherlight, minimalist starter block theme built on the SmidgenCSS framework.',
    'changelog'   => ! empty($remote->body) ? wpautop($remote->body) : 'See GitHub for the full changelog.',
  );

  return $info;
}
add_filter('themes_api', 'smidgen_themes_api_filter', 10, 3);
