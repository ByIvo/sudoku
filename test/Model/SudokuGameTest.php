<?php

namespace Sudoku\Model;


use PHPUnit\Framework\TestCase;

class SudokuGameTest extends TestCase
{
    public function testWhenGetAllRows_thenShouldReturnAllLines(): void {
        $validSudokuGame = <<<SUDOKU
6 3 9 4 8 1 5 7 2
5 2 4 3 7 9 6 1 8
1 7 8 5 6 2 9 4 3
7 6 2 1 4 3 8 5 9
9 8 1 7 5 6 2 3 4
4 5 3 9 2 8 7 6 1
3 1 5 8 9 7 4 2 6
8 4 6 2 3 5 1 9 7
2 9 7 6 1 4 3 8 5
SUDOKU;
        $sudokuGame = new SudokuGame($validSudokuGame);

        $rows = $sudokuGame->getAllRows();

        $expectedRows = [
            ['6','3','9','4','8','1','5','7','2'],
            ['5','2','4','3','7','9','6','1','8'],
            ['1','7','8','5','6','2','9','4','3'],
            ['7','6','2','1','4','3','8','5','9'],
            ['9','8','1','7','5','6','2','3','4'],
            ['4','5','3','9','2','8','7','6','1'],
            ['3','1','5','8','9','7','4','2','6'],
            ['8','4','6','2','3','5','1','9','7'],
            ['2','9','7','6','1','4','3','8','5'],
        ];
        $this->assertThat($rows, $this->equalTo($expectedRows));
    }
}
