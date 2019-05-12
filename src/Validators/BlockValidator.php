<?php


namespace Sudoku\Validators;


use Sudoku\Model\SudokuGame;

class BlockValidator implements Validator {

    public function validateSudokuGame(SudokuGame $sudokuGame): bool
    {
        $blocks = $sudokuGame->getAllBlocks();
        foreach ($blocks as $block) {
            if($this->hasAnyDuplicationInBlock($block)) {
                return false;
            }
        }

        return true;
    }

    private function hasAnyDuplicationInBlock($block): bool {
        return sizeof($block) !== sizeof(array_unique($block));
    }
}