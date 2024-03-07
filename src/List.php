<?php

namespace Hexlet\Code\List;

use cli\Table;

function getGamesList(): void
{
    $binDirectory = __DIR__ . '/../bin';

    if (is_dir($binDirectory)) {
        $directoriesArray = array_map(function ($value) {
            return ["make $value"];
        }, array_diff((array) scandir($binDirectory), ['..', '.', 'game-list']));
        $table = new Table();
        $table->setHeaders(['The list of games']);
        $table->setRows($directoriesArray);
        $table->display();
    }
}
