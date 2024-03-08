<?php

namespace Hexlet\Code\Games\BrainEven;

use function Hexlet\Code\Engine\play;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const TOTAL_ROUNDS = 3;

function handler(): void
{
    $getQuestionWithAnswer = function (): array {
        $num = rand(1, 100);
        $correctAnswer = $num % 2 === 0 ? 'yes' : 'no';

        return [$num, $correctAnswer];
    };
    play(GAME_DESCRIPTION, $getQuestionWithAnswer, TOTAL_ROUNDS);
}
