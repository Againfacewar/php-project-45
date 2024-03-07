<?php

namespace Hexlet\Code\List;

use cli\Table;

function getGamesList(): void
{
    $binDirectory = __DIR__ . '/../bin';

    if (is_dir($binDirectory)) {
        $directories = scandir($binDirectory);
        $notAllowDirectories = ['..', '.', 'game-list'];
        $mappedDirectories = array_map(function ($value) {
            return "make $value";
        }, array_diff($directories, $notAllowDirectories));
        $table = new Table();
        $table->setHeaders($mappedDirectories);
        $table->display();
    }
}
