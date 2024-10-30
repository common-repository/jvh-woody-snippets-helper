<?php

use JVH\WoodySnippersHelper\AllLibrarySnippetsOnePage;

if ( ! defined('ABSPATH')) {
    exit;
}

if ((isset($_GET['post_type']) && $_GET['post_type'] === 'wbcr-snippets') || AllLibrarySnippetsOnePage::instance()->isSnippetLibraryPage()) {
    ?>
    <script>
        (function () {
            setTimeout(function () {
                showImagesSnippets();
                addVideoLinks();
                addKennisbankLinks();
            }, 500);

            setTimeout(function () {
            }, 600);

            function showImagesSnippets() {
                jQuery('.wbcr-inp-snippet-description, .column-winp_description').each(function () {
                    var description = jQuery(this).html();
                    description = description.replace(/(http.*jpg|http.*png)/, "<img src='$1' style='max-width: 350px;'>");

                    jQuery(this).html(description);
                });
            }

            function addVideoLinks() {
                jQuery('.wbcr-inp-snippet-description, .column-winp_description').each(function () {
                    var description = jQuery(this).html();
                    description = description.replace(/(http\S*berrycast\S*)/, "<a href='$1' target='_blank'>Bekijk video</a>");

                    jQuery(this).html(description);
                });
            }

            function addKennisbankLinks() {
                jQuery('.wbcr-inp-snippet-description, .column-winp_description').each(function () {
                    var description = jQuery(this).html();
                    description = description.replace(/(http\S*kennisbank\S*)/, "<a href='$1' target='_blank'>Lees kennisbank artikel</a>");

                    jQuery(this).html(description);
                });
            }
        })();
    </script>
    <?php
}
