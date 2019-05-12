<?php


namespace Sudoku\Validators;


use Sudoku\Model\SudokuGame;

class RowValidator
{

    public function validateAllRowsIn(SudokuGame $sudokuGame): bool
    {
        return true;
    }
}