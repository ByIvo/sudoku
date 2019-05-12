<?php


namespace Sudoku\Validators;


use Sudoku\Model\SudokuGame;

class RowValidator
{

    public function validateAllRowsIn(SudokuGame $sudokuGame): bool
    {
        foreach ($sudokuGame->getAllRows() as $row) {
            if($this->containDuplicationInRow($row)) {
                return false;
            }
        }
        return true;
    }

    private function containDuplicationInRow($row): bool {
        $rowWithoutDuplicity = array_unique($row);
        return sizeof($row) !== sizeof($rowWithoutDuplicity);
    }
}