<?php

namespace Hexlet\Code\Games\BrainCalc;

use function Hexlet\Code\Engine\main;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const TOTAL_ROUNDS = 3;
function handler(): void
{
    $getQuestionWithAnswer = function (): array {
        $operatorsArray = ['+', '-', '*'];
        $randomNumsArray = [rand(1, 30), rand(1, 30)];
        $randomNum1 = max($randomNumsArray);
        $randomNum2 = min($randomNumsArray);
        $randomOperator = $operatorsArray[array_rand($operatorsArray)];

        return [
            expressionToString($randomNum1, $randomNum2, $randomOperator),
            resolveExpression($randomNum1, $randomNum2, $randomOperator)
        ];
    };
    main(GAME_DESCRIPTION, $getQuestionWithAnswer, TOTAL_ROUNDS);
}

function expressionToString(int $num1, int $num2, string $operator): string
{
    return "$num1 $operator $num2";
}

function resolveExpression(int $num1, int $num2, string $operator)
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
    }
    return null;
}
