<?php

namespace Hexlet\Code\BrainGames\BrainEventHandler;

use function cli\line;
use function cli\prompt;

function handler(): void
{
    $name = welcome();

    $correctAnswerCount = 0;
    while ($correctAnswerCount < 3) {
        $randomNum = rand(1, 100);
        line("Question: {$randomNum}");
        $answer = prompt("Your answer");
        $correctAnswer = resolveQuestion($randomNum);

        if ($answer === $correctAnswer) {
            $msg = $correctAnswerCount === 2 ? "Correct!\nCongratulations, {$name}!" : 'Correct!';
            line($msg);
            $correctAnswerCount++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, {$name}!");
            break;
        }
    }
}

function resolveQuestion(int $num): string
{
    return $num % 2 === 0 ? 'yes' : 'no';
}

function welcome(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    $ucFirstName = ucfirst($name);
    line("Hello, %s!", $ucFirstName);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    return $ucFirstName;
}