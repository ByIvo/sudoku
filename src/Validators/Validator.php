<?php


namespace Sudoku\Validators;


use Sudoku\Model\SudokuGame;

interface Validator {

    public function validateSudokuGame(SudokuGame $sudokuGame): bool;
}