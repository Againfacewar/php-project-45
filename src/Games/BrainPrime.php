<?php

namespace Hexlet\Code\Games\BrainPrime;

use function Hexlet\Code\Engine\main;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const TOTAL_ROUNDS = 3;
function handler(): void
{
    $getQuestionWithAnswer = function (): array {
        $randomNum = rand(2, 100);
        return [
            $randomNum,
            isPrime($randomNum) ? 'yes' : 'no'
        ];
    };
    main(GAME_DESCRIPTION, $getQuestionWithAnswer, TOTAL_ROUNDS);
}

function isPrime(int $num): bool
{
    if ($num % 2 === 0 && $num !== 2) {
        return false;
    }

    $divisorsCount = 0;
    $i = 1;
    while ($i <= $num) {
        $divisor = $num % $i;
        if ($divisor === 0) {
            $divisorsCount++;
        }
        $i++;
    }

    return $divisorsCount === 2;
}
