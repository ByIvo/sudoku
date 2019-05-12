<?php

namespace Test\Sudoku;


use PHPUnit\Framework\TestCase;
use Sudoku\Model\SudokuGame;
use Sudoku\SudokuValidator;

class SudokuValidatorTest extends TestCase
{

    public function getValidSudokuGames() : array {
        return [
            [<<<SUDOKU
6 3 9 4 8 1 5 7 2
5 2 4 3 7 9 6 1 8
1 7 8 5 6 2 9 4 3
7 6 2 1 4 3 8 5 9
9 8 1 7 5 6 2 3 4
4 5 3 9 2 8 7 6 1
3 1 5 8 9 7 4 2 6
8 4 6 2 3 5 1 9 7
2 9 7 6 1 4 3 8 5
SUDOKU
            ],
            [<<<SUDOKU
1 9 7 5 6 2 8 4 3
8 6 5 4 1 3 7 2 9
2 4 3 9 7 8 1 6 5
5 7 9 3 8 6 2 1 4
6 3 8 1 2 4 5 9 7
4 2 1 7 9 5 3 8 6
9 8 2 6 5 7 4 3 1
3 5 6 8 4 1 9 7 2
7 1 4 2 3 9 6 5 8
SUDOKU
            ],
        ];
    }

    /**
     * @dataProvider getValidSudokuGames
     */
    public function testAValidLine_shouldReturnTrue(string $validSudokuGame): void {
        $sudokuGame = new SudokuGame($validSudokuGame);

        $validGame = SudokuValidator::validate($sudokuGame);

        $this->assertThat($validGame, $this->isTrue());
    }

    public function getAllInvalidSudokuGames() : array {
        return [
            ['line_1_invalid' => <<<SUDOKU
1 1 7 5 6 2 8 4 3
8 6 5 4 1 3 7 2 9
2 4 3 9 7 8 1 6 5
5 7 9 3 8 6 2 1 4
6 3 8 1 2 4 5 9 7
4 2 1 7 9 5 3 8 6
9 8 2 6 5 7 4 3 1
3 5 6 8 4 1 9 7 2
7 1 4 2 3 9 6 5 8
SUDOKU
            ],
            ['line_2_invalid' => <<<SUDOKU
1 9 7 5 6 2 8 4 3
8 6 5 4 1 3 7 8 9
2 4 3 9 7 8 1 6 5
5 7 9 3 8 6 2 1 4
6 3 8 1 2 4 5 9 7
4 2 1 7 9 5 3 8 6
9 8 2 6 5 7 4 3 1
3 5 6 8 4 1 9 7 2
7 1 4 2 3 9 6 5 8
SUDOKU
            ],
            ['line_3_invalid' => <<<SUDOKU
1 9 7 5 6 2 8 4 3
8 6 5 4 1 3 7 8 9
2 4 3 9 9 8 1 6 5
5 7 9 3 8 6 2 1 4
6 3 8 1 2 4 5 9 7
4 2 1 7 9 5 3 8 6
9 8 2 6 5 7 4 3 1
3 5 6 8 4 1 9 7 2
7 1 4 2 3 9 6 5 8
SUDOKU
            ],
            ['line_4_invalid' => <<<SUDOKU
1 9 7 5 6 2 8 4 3
8 6 5 4 1 3 7 8 9
2 4 3 9 7 8 1 6 5
5 7 9 7 8 6 2 1 4
6 3 8 1 2 4 5 9 7
4 2 1 7 9 4 3 8 6
9 8 2 6 5 7 4 3 1
3 5 6 8 4 1 9 7 2
7 1 4 2 3 9 6 5 8
SUDOKU
            ],
            ['line_5_invalid' => <<<SUDOKU
1 9 7 5 6 2 8 4 3
8 6 5 4 1 3 7 8 9
2 4 3 9 7 8 1 6 5
5 7 9 3 8 6 2 1 4
6 3 5 1 2 4 5 9 7
4 2 1 7 9 4 3 8 6
9 8 2 6 5 7 4 3 1
3 5 6 8 4 1 9 7 2
7 1 4 2 3 9 6 5 8
SUDOKU
            ],
            ['line_6_invalid' => <<<SUDOKU
1 9 7 5 6 2 8 4 3
8 6 5 4 1 3 7 8 9
2 4 3 9 7 8 1 6 5
5 7 9 3 8 6 2 1 4
6 3 5 1 2 4 5 9 7
4 2 1 7 8 4 3 8 6
9 8 2 6 5 7 4 3 1
3 5 6 8 4 1 9 7 2
7 1 4 2 3 9 6 5 8
SUDOKU
            ],
            ['line_7_invalid' => <<<SUDOKU
1 9 7 5 6 2 8 4 3
8 6 5 4 1 3 7 8 9
2 4 3 9 7 8 1 6 5
5 7 9 3 8 6 2 1 4
6 3 5 1 2 4 5 9 7
4 2 1 7 9 4 3 8 6
9 8 2 6 5 7 4 7 1
3 5 6 8 4 1 9 7 2
7 1 4 2 3 9 6 5 8
SUDOKU
            ],
            ['line_8_invalid' => <<<SUDOKU
1 9 7 5 6 2 8 4 3
8 6 5 4 1 3 7 8 9
2 4 3 9 7 8 1 6 5
5 7 9 3 8 6 2 1 4
6 3 5 1 2 4 5 9 7
4 2 1 7 9 4 3 8 6
9 8 2 6 5 7 4 3 1
3 2 6 8 4 1 9 7 2
7 1 4 2 3 9 6 5 8
SUDOKU
            ],
            ['line_9_invalid' => <<<SUDOKU
1 9 7 5 6 2 8 4 3
8 6 5 4 1 3 7 8 9
2 4 3 9 7 8 1 6 5
5 7 9 3 8 6 2 1 4
6 3 5 1 2 4 5 9 7
4 2 1 7 9 4 3 8 6
9 8 2 6 5 7 4 3 1
3 5 6 8 4 1 9 7 2
7 1 4 2 3 9 1 5 8
SUDOKU
            ],
        ];
    }

    /**
     * @dataProvider getAllInvalidSudokuGames
     */
    public function testInvalidLineInSudokuGame_shouldReturnFalse(string $invalidSudokuGame): void {
        $sudokuGame = new SudokuGame($invalidSudokuGame);

        $invalidGame = SudokuValidator::validate($sudokuGame);

        $this->assertThat($invalidGame, $this->isFalse());
    }


}
