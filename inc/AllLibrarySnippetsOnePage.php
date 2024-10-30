<?php

namespace JVH\WoodySnippersHelper;

if ( ! defined('ABSPATH')) {
    exit;
}

class AllLibrarySnippetsOnePage {
    private static self $instance;

    public function __construct() {
        if ($this->isSnippetLibraryPage()) {
            if ( ! $this->shouldReplacePerPageLine()) {
                return;
            }

            $this->setSnippetsPerPage();
            $this->refreshCurrentPage();
        }
    }

    public function isSnippetLibraryPage(): bool {
        return isset($_GET['page']) && $_GET['page'] === 'snippet-library-wbcr_insert_php';
    }

    private function shouldReplacePerPageLine(): bool {
        foreach ($this->getSnippetFileContent() as $line) {
            if (stripos($line, '$this->per_page = 10;') !== false) {
                return true;
            }
			// Used 300 per_page before, but API cloud has 50 max
            else if (stripos($line, '$this->per_page = 300;') !== false) {
                return true;
            }
        }

        return false;
    }

    private function getSnippetFileContent() {
        return file($this->getSnippetFilePath());
    }

    private function getSnippetFilePath(): string {
        return WP_CONTENT_DIR . '/plugins/insert-php/admin/includes/class.snippets.table.php';
    }

    private function setSnippetsPerPage(): void {
        file_put_contents($this->getSnippetFilePath(), implode('', $this->getReplacedSnippetsContent()));
    }

    private function getReplacedSnippetsContent(): array {
        return array_map(static function ($data) {
            return ( stripos($data, '$this->per_page = 10;') !== false || stripos($data, '$this->per_page = 300;') !== false ) ? '$this->per_page = 50;' . "\n" : $data;
        }, $this->getSnippetFileContent());
    }

    private function refreshCurrentPage(): void {
        header('Location: ' . $_SERVER['REQUEST_URI']);
    }

    public static function instance(): self {
        if ( ! isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }
}
