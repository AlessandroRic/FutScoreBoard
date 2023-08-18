<?php

use PHPUnit\Framework\TestCase;

class ScoreBoardTest extends TestCase {

    private $scoreboard;

    public function setUp():void {
        $this->scoreboard = new ScoreBoard();
    }

    /**
     * Test the startGame() method
     */
    public function testStartGame() {
        $this->scoreboard->startGame('TeamA', 'TeamB');
        $summary = $this->scoreboard->getSummary();
        $this->assertEquals('TeamA 0 - TeamB 0', $summary[0]);
    }

    /**
     * Test the updateScore() method
     */
    public function testUpdateScore() {
        $this->scoreboard->startGame('TeamA', 'TeamB');
        $this->scoreboard->updateScore('TeamA', 'TeamB', 2, 3);
        $summary = $this->scoreboard->getSummary();
        $this->assertEquals('TeamA 2 - TeamB 3', $summary[0]);
    }

    /**
     * Test the finishGame() method
     */
    public function testFinishGame() {
        $this->scoreboard->startGame('TeamA', 'TeamB');
        $this->scoreboard->finishGame('TeamA', 'TeamB');
        $summary = $this->scoreboard->getSummary();
        $this->assertEmpty($summary);
    }

    /**
     * Test the getSummary() method
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

