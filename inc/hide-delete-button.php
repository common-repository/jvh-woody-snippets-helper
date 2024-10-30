<?php

use JVH\WoodySnippersHelper\AllLibrarySnippetsOnePage;

if ( ! defined('ABSPATH')) {
    exit;
}

add_action('admin_head', function () {
    if ( ! AllLibrarySnippetsOnePage::instance()->isSnippetLibraryPage()) {
        return;
    }

    ?>
    <style>
        a.wbcr-inp-delete-snippet-button.button {
            display: none;
        }
    </style>
    <?php
});
