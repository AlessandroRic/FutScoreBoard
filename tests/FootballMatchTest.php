<?php

use PHPUnit\Framework\TestCase;
use FootballScoreBoard\FootballMatch;

class FootballMatchTest extends TestCase {

    /**
     * Test if the constructor of the FootballMatch class properly initializes
     * the class properties with the provided parameters and default values.
     */
    public function testConstructor() {
        $homeTeam = 'Home Team';
        $awayTeam = 'Away Team';
        
        // Instantiate a new FootballMatch with sample teams
        $match = new FootballMatch($homeTeam, $awayTeam);
        
        // Assert that the team names are initialized correctly
        $this->assertEquals($homeTeam, $match->getHomeTeam());
        $this->assertEquals($awayTeam, $match->getAwayTeam());
        
        // Check that initial scores are set to 0
        $this->assertEquals(0, $match->homeScore);
        $this->assertEquals(0, $match->awayScore);
        
        // Ensure a timestamp was generated upon object creation
        $this->assertNotNull($match->timestamp);
    }

    /**
     * Test if the updateScore method correctly updates the scores 
     * of the home and away teams.
     */
    public function testUpdateScore() {
        // Instantiate a new FootballMatch with sample teams
        $match = new FootballMatch('Home Team', 'Away Team');
        
        // Update the match scores
        $match->updateScore(3, 4);
        
        // Assert the scores are updated correctly
        $this->assertEquals(3, $match->homeScore); 
        $this->assertEquals(4, $match->awayScore);
    }

    /**
     * Test if the getTotalScore method returns the correct combined 
     * score of both teams.
     */
    public function testGetTotalScore() {
        // Instantiate a new FootballMatch with sample teams
        $match = new FootballMatch('Home Team', 'Away Team');
        
        // Update the match scores
        $match->updateScore(3, 4);
        
        // Assert the combined score is correct
        $this->assertEquals(7, $match->getTotalScore());
    }
}
