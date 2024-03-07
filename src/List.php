<?php

namespace Hexlet\Code\List;

use cli\Table;

function getGamesList(): void
{
    $binDirectory = __DIR__ . '/../bin';

    if (is_dir($binDirectory)) {
        $directoriesArray = array_map(function ($value) {
            return "make $value";
        }, array_diff(scandir($binDirectory), array('..', '.', 'game-list')));
        $table = new Table();
        $table->setHeaders($directoriesArray);
        $table->display();
    }
}
