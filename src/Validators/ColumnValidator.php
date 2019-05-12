<?php


namespace Sudoku\Validators;


use Sudoku\Model\SudokuGame;

class ColumnValidator {
    public function validateAllColumnsIn(SudokuGame $sudokuGame): bool {
        foreach ($sudokuGame->getAllColumns() as $column) {
            if($this->hasAnyDuplicationInColumn($column)) {
                return false;
            }
        }

        return true;
    }

    private function hasAnyDuplicationInColumn($column): bool {
        return sizeof($column) !== sizeof(array_unique($column));
    }
}