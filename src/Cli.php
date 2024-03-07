<?php

namespace Hexlet\Code\Cli;

use function cli\line;
use function cli\prompt;

function welcome(): void
{
    line("Welcome to the Brain Game!\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
