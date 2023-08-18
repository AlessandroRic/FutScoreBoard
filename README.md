# Football World Cup Score Board

A simple PHP library to manage a live Football World Cup score board.

## Features

- Start a game with initial score set to 0-0.
- Finish (or remove) a game from the scoreboard.
- Update the score of a game.
- Get a summary of games, sorted by total score and, in the event of a tie, by the most recently added.

## Installation

1. Clone the repository:
```
git clone git@github.com:AlessandroRic/footballscoreboard.git
```

2. Navigate to the project directory:
```
cd football-scoreboard
```

3. Install the dependencies (if any) using [Composer](https://getcomposer.org/):
```
composer install
```

## Usage

Check the provided example in the main code script to see how to use the `ScoreBoard` class.
Script `scoreboard_script.php` into main folder

If you want to see an example about the code you can run:
```
composer run-script run-scoreboard
```

## Testing

2. Run tests:
```
composer tests
```

## Contributions

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
