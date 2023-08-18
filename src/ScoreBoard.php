<?php

namespace FootballScoreBoard;

/**
 * This class is used to manage the score board of a football match.
 */
class ScoreBoard {
    /** 
     * @var array An array of FootballMatch objects representing ongoing matches.
     */
    public $matches = [];

    /**
     * Starts a new game between two teams.
     *
     * @param string $homeTeam The name of the home team.
     * @param string $awayTeam The name of the away team.
     * @return void
     */
    public function startGame(string $homeTeam, string $awayTeam): void {
        $this->matches[] = new FootballMatch($homeTeam, $awayTeam);
    }

    /**
     * Finishes an ongoing game between two teams.
     *
     * @param string $homeTeam The name of the home team.
     * @param string $awayTeam The name of the away team.
     * @return bool True if the game was found and finished, false otherwise.
     */
    public function finishGame(string $homeTeam, string $awayTeam): bool {
        foreach ($this->matches as $index => $match) {
            if ($match->getHomeTeam() === $homeTeam && $match->getAwayTeam() === $awayTeam) {
                array_splice($this->matches, $index, 1);
                return true;
            }
        }
        return false;
    }

    /**
     * Updates the score of an ongoing game between two teams.
     *
     * @param string $homeTeam The name of the home team.
     * @param string $awayTeam The name of the away team.
     * @param int $homeScore The new score for the home team.
     * @param int $awayScore The new score for the away team.
     * @return bool True if the score was updated, false otherwise.
     */
    public function updateScore(string $homeTeam, string $awayTeam, int $homeScore, int $awayScore): bool {
        foreach ($this->matches as $match) {
            if ($match->getHomeTeam() === $homeTeam && $match->getAwayTeam() === $awayTeam) {
                $match->updateScore($homeScore, $awayScore);
                return true;
            }
        }
        return false;
    }

    /**
     * Gets a summary of all ongoing matches, sorted by total score.
     *
     * @return array An array of strings representing the match summaries.
     */
    public function getSummary(): array {
        usort($this->matches, function($a, $b) {
            if ($a->getTotalScore() === $b->getTotalScore()) {
                return $b->getTimestamp() - $a->getTimestamp();
            }
            return $b->getTotalScore() - $a->getTotalScore();
        });

        $summary = [];
        foreach ($this->matches as $match) {
            $summary[] = "{$match->getHomeTeam()} {$match->homeScore} - {$match->getAwayTeam()} {$match->awayScore}";
        }
        return $summary;
    }
}
