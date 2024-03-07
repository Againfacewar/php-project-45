<?php

namespace Hexlet\Code\List;

use cli\Table;

function getGamesList(): void
{
    $binDirectory = __DIR__ . '/../bin';

    if (is_dir($binDirectory)) {
        $directories = scandir($binDirectory);
        $notAllowDirectories = ['..', '.', 'game-list'];
        $diff = array_diff($directories, $notAllowDirectories);
        $mappedDirectories = array_map(function ($value) {
            return "make $value";
        }, $diff);
        $table = new Table();
        $table->setHeaders($mappedDirectories);
        $table->display();
    }
}
