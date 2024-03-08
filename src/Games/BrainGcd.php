<?php

namespace Hexlet\Code\Games\BrainGcd;

use function Hexlet\Code\Engine\play;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const TOTAL_ROUNDS = 3;

function handler(): void
{
    $getQuestionWithAnswer = function (): array {
        $randomNums = [rand(1, 100), rand(1, 100)];

        return [
            questionPreparing($randomNums[0], $randomNums[1]),
            findGcd($randomNums)
        ];
    };
    play(GAME_DESCRIPTION, $getQuestionWithAnswer, TOTAL_ROUNDS);
}

function questionPreparing(int $num1, int $num2): string
{
    return "$num1 $num2";
}

function findGcd(array $nums): int
{
    $min = min($nums);
    $max = max($nums);
    if ($max % $min === 0) {
        return $min;
    }
    $greatestDivisor = 1;
    for ($i = $min - 1; $i >= 2; $i--) {
        $isEvenMin = $min % $i === 0;
        $isEvenMax = $max % $i === 0;
        if ($isEvenMin && $isEvenMax) {
            $greatestDivisor = $i;
            break;
        }
    }

    return $greatestDivisor;
}
