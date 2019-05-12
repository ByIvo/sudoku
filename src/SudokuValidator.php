<?php


namespace Sudoku;


use Sudoku\Model\SudokuGame;
use Sudoku\Validators\RowValidator;

class SudokuValidator {

    /**
     * @var RowValidator
     */
    private $rowValidator;

    private function __construct(RowValidator $rowValidator) {
        $this->rowValidator = $rowValidator;
    }

    public static function validate(SudokuGame $sudokuGame) : bool {
        $sudokuValidator = new SudokuValidator(new RowValidator());

        return $sudokuValidator->validateWithDefaultsValidators($sudokuGame);
    }

    private function validateWithDefaultsValidators(SudokuGame $sudokuGame) : bool {
        return $this->rowValidator->validateAllRowsIn($sudokuGame);
    }
}