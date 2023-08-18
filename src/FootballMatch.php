<?php

namespace FootballScoreBoard;

/**
 * Class to represent a football match.
 */
class FootballMatch {
    
    /** @var string Home team name */
    public $homeTeam;
    
    /** @var string Away team name */
    public $awayTeam;
    
    /** @var int Home team score */
    public $homeScore;
    
    /** @var int Away team score */
    public $awayScore;
    
    /** @var int Timestamp of when the match was created */
    public $timestamp;

    /**
     * Constructor for FootballMatch class.
     *
     * @param string $homeTeam Name of the home team.
     * @param string $awayTeam Name of the away team.
     */
    public function __construct(string $homeTeam, string $awayTeam) {
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
        $this->homeScore = 0;
        $this->awayScore = 0;
        $this->timestamp = time();
    }

    /**
     * Update the scores of the home and away teams.
     *
     * @param int $homeScore Score of the home team.
     * @param int $awayScore Score of the away team.
     * @return void
     */
    public function updateScore(int $homeScore, int $awayScore): void {
        $this->homeScore = $homeScore;
        $this->awayScore = $awayScore;
    }

    /**
     * Get the total score of the match.
     *
     * @return int Sum of the scores of the home and away teams.
     */
    public function getTotalScore(): int {
        return $this->homeScore + $this->awayScore;
    }

    /**
     * Get the name of the home team.
     *
     * @return string Name of the home team.
     */
    public function getHomeTeam(): string {
        return $this->homeTeam;
    }

    /**
     * Get the name of the away team.
     *
     * @return string Name of the away team.
     */
    public function getAwayTeam(): string {
        return $this->awayTeam;
    }

    /**
     * Get the timestamp of when the match was created.
     *
     * @return int Timestamp of match creation.
     */
    public function getTimestamp(): int {
        return $this->timestamp;
    }
}
