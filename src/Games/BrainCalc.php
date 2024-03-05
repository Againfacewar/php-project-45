<?php

namespace Hexlet\Code\Games\BrainCalc;

use function Hexlet\Code\Engine\main;

const GAME_DESCRIPTION = 'What is the result of the expression?';
function handler(): void
{
    $getQuestionWithAnswer = function (): array {
        $numsArray = range(1, 30);
        $operatorsArray = ['+', '-', '*'];
        $randomNumsArray = [$numsArray[array_rand($numsArray)], $numsArray[array_rand($numsArray)]];
        $randomNum1 = max($randomNumsArray);
        $randomNum2 = min($randomNumsArray);
        $randomOperator = $operatorsArray[array_rand($operatorsArray)];

        return [
            expressionToString($randomNum1, $randomNum2, $randomOperator),
            resolveExpression($randomNum1, $randomNum2, $randomOperator)
        ];
    };
    main(GAME_DESCRIPTION, $getQuestionWithAnswer);
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