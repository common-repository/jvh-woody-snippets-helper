<?php
/**
 * Plugin Name:       JVH Woody Snippets helper
 * Description:       Snippet images and all library snippets on one page for easy access
 * Version:           1.2.2
 * Author:            JVH webbouw
 * Author URI:        https://jvhwebbouw.nl
 * License:           GPL-v3
 * Requires PHP:      7.4
 * Requires at least: 5.0
 */

use JVH\WoodySnippersHelper\AllLibrarySnippetsOnePage;

require_once __DIR__ . '/inc/AllLibrarySnippetsOnePage.php';

AllLibrarySnippetsOnePage::instance();

require_once __DIR__ . '/inc/hide-delete-button.php';
require_once __DIR__ . '/inc/show-images.php';
