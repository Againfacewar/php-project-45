<?php

namespace Hexlet\Code\Games\BrainEven;

use function cli\line;
use function cli\prompt;

function resolveQuestion(int $num): string
{
    return $num % 2 === 0 ? 'yes' : 'no';
}

function getQuestion(): int
{
    return rand(1, 100);
}