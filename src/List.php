<?php

namespace Hexlet\Code\List;

use cli\Table;

function getGamesList(): void
{
    $binDirectory = __DIR__ . '/../bin';

    if (is_dir($binDirectory)) {
        $directories = scandir($binDirectory);
        $mappedDirectories = array_map(function ($value) {
            return "make $value";
        }, array_diff($directories, array('..', '.', 'game-list')));
        $table = new Table();
        $table->setHeaders($mappedDirectories);
        $table->display();
    }
}
