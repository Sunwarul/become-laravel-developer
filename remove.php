<?php

/**
 * This script will create a file template in each directory and subdirectories
 * Enter a filename with extension and put some content into it.
 * To quit from content editing mode to next, hit q or insert the word quit/exit
 * @author Sunwarul Islam <sunwarul.dev@gmail.com>
 * @version 1.0.0
 */
echo "File name\n";
$fileName = trim(fgets(STDIN));

$dirs = scandir(__DIR__);
foreach ($dirs as $dir) {
    if (is_dir($dir) && !in_array($dir, ['.', '..', 'node_modules', 'vendor', '.git'])) {
        $reit = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir),  RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($reit as $item) {
            if ($item->isDir()) {
                if (!in_array($item->getFilename(), ['..'])) {
                    unlink("{$item}/{$fileName}");
                }
            }
        }
    }
}