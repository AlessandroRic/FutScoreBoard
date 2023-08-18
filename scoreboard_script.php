<?php

require_once __DIR__ . '/vendor/autoload.php';

use FootballScoreBoard\ScoreBoard;

$scoreboard = new ScoreBoard();

$scoreboard->startGame('Mexico', 'Canada');
$scoreboard->updateScore('Mexico', 'Canada', 0, 5);
$scoreboard->startGame('Spain', 'Brazil');
$scoreboard->updateScore('Spain', 'Brazil', 10, 2);
$scoreboard->startGame('Germany', 'France');
$scoreboard->updateScore('Germany', 'France', 2, 2);
$scoreboard->startGame('Uruguay', 'Italy');
$scoreboard->updateScore('Uruguay', 'Italy', 6, 6);
$scoreboard->startGame('Argentina', 'Australia');
$scoreboard->updateScore('Argentina', 'Australia', 3, 1);

print_r($scoreboard->getSummary());