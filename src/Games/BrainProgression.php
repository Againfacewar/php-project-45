<?php

namespace Hexlet\Code\Games\BrainProgression;

use function Hexlet\Code\Engine\main;

const GAME_DESCRIPTION = 'What number is missing in the progression?';
const TOTAL_ROUNDS = 3;
function handler(): void
{
    $getQuestionWithAnswer = function (): array {
        $progression = generateProgression();
        [$preparedProgression, $correctAnswer] = questionPreparing($progression);
        return [
            $preparedProgression,
            $correctAnswer
        ];
    };
    main(GAME_DESCRIPTION, $getQuestionWithAnswer, TOTAL_ROUNDS);
}

function questionPreparing(array $progression): array
{
    $result = [...$progression];
    $hiddenNum = array_rand($result);
    $result[$hiddenNum] = '..';
    return [implode(' ', $result), $progression[$hiddenNum]];
}

function generateProgression(): array
{
    $step = rand(1, 10);
    $result = [];
    $result[] = rand(0, 20);
    $i = 1;
    while ($i < 10) {
        $result[] = $result[$i - 1] + $step;
        $i++;
    }

    return $result;
}
