<?php

namespace Hexlet\Code\Engine;

use function cli\line;
use function cli\prompt;

function play(string $gameDescription, callable $getQuestionWithAnswer, int $totalRounds): void
{
    $name = welcome($gameDescription);

    $correctAnswerCount = 0;
    while ($correctAnswerCount < $totalRounds) {
        [$question, $correctAnswer] = $getQuestionWithAnswer();
        line("Question: %s", $question);
        $answer = prompt("Your answer");
        if ($answer === "$correctAnswer") {
            line("Correct!");
            if ($correctAnswerCount === $totalRounds - 1) {
                line("Congratulations, %s!", $name);
            }
            $correctAnswerCount++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            break;
        }
    }
}

function welcome(string $gameDescription): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    $ucFirstName = ucfirst($name);
    line("Hello, %s!", $ucFirstName);
    line($gameDescription);

    return $ucFirstName;
}
