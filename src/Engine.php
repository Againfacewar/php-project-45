<?php

namespace Hexlet\Code\Engine;

use function cli\line;
use function cli\prompt;

function main(string $gameDescription, callable $getQuestionWithAnswer, int $totalRounds): void
{
    $name = welcome($gameDescription);

    $correctAnswerCount = 0;
    while ($correctAnswerCount < $totalRounds) {
        [$question, $correctAnswer] = $getQuestionWithAnswer();
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if ($answer === "$correctAnswer") {
            $msg = $correctAnswerCount === $totalRounds - 1 ? "Correct!\nCongratulations, {$name}!" : 'Correct!';
            line($msg);
            $correctAnswerCount++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, {$name}!");
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
