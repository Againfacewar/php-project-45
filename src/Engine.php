<?php

namespace Hexlet\Code\Engine;

use function cli\line;
use function cli\prompt;

function handler(string $game)
{
    $gameHandlerPath = __DIR__ . "/Games/{$game}.php";

    if (file_exists($gameHandlerPath)) {
        require_once $gameHandlerPath;
    } else {
        line('Файл-обработчик для данной игры не найден');
        return;
    }

    $name = welcome();

    $correctAnswerCount = 0;
    while ($correctAnswerCount < 3) {
        $getQuestion = "\\Hexlet\\Code\\Games\\" . $game . "\\getQuestion";
        $question = $getQuestion();
        line("Question: {$question}");
        $answer = prompt("Your answer");
        $resolveQuestion = "\\Hexlet\\Code\\Games\\" . $game . "\\resolveQuestion";
        $correctAnswer = $resolveQuestion($question);

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


function welcome(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    $ucFirstName = ucfirst($name);
    line("Hello, %s!", $ucFirstName);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    return $ucFirstName;
}