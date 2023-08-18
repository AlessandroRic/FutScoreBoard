<?php

use FootballScoreBoard\ScoreBoard;
use PHPUnit\Framework\TestCase;

/**
 * Unit test class for the ScoreBoard class.
 */
class ScoreBoardTest extends TestCase {

    /**
     * @var ScoreBoard An instance of ScoreBoard to be used in tests.
     */
    private $scoreboard;

    /**
     * Sets up a fresh ScoreBoard instance before each test.
     */
    public function setUp(): void {
        $this->scoreboard = new ScoreBoard();
    }

    /**
     * Test if the startGame() method correctly initializes a new game 
     * with the provided teams and default scores.
     */
    public function testStartGame() {
        $this->scoreboard->startGame('TeamA', 'TeamB');
        $summary = $this->scoreboard->getSummary();
        $this->assertEquals('TeamA 0 - TeamB 0', $summary[0]);
    }

    /**
     * Test if the updateScore() method correctly updates the scores 
     * of the specified teams.
     */
    public function testUpdateScore() {
        $this->scoreboard->startGame('TeamA', 'TeamB');
        $this->scoreboard->updateScore('TeamA', 'TeamB', 2, 3);
        $summary = $this->scoreboard->getSummary();
        $this->assertEquals('TeamA 2 - TeamB 3', $summary[0]);
    }

    /**
     * Test if the finishGame() method removes the specified game from the scoreboard.
     */
    public function testFinishGame() {
        $this->scoreboard->startGame('TeamA', 'TeamB');
        $this->scoreboard->finishGame('TeamA', 'TeamB');
        $summary = $this->scoreboard->getSummary();
        $this->assertEmpty($summary);
    }

    /**
     * Test if the getSummary() method returns the games sorted by 
     * total score and then by recent addition.
     */
    public function testGetSummary() {
        $this->scoreboard->startGame('TeamA', 'TeamB');
        $this->scoreboard->updateScore('TeamA', 'TeamB', 0, 5);
        $this->scoreboard->startGame('TeamC', 'TeamD');
        $this->scoreboard->updateScore('TeamC', 'TeamD', 10, 2);
        $this->scoreboard->startGame('TeamE', 'TeamF');
        $this->scoreboard->updateScore('TeamE', 'TeamF', 2, 2);

        $summary = $this->scoreboard->getSummary();

        $this->assertEquals('TeamC 10 - TeamD 2', $summary[0]);
        $this->assertEquals('TeamA 0 - TeamB 5', $summary[1]);
        $this->assertEquals('TeamE 2 - TeamF 2', $summary[2]);
    }
}
