<?php


namespace Sudoku;


use Sudoku\Model\SudokuGame;

class SudokuValidator {

    /**
     * @var array
     */
    private $validators;

    private function __construct(DefaultValidators $validators) {
        $this->validators = $validators->create();
    }

    public static function validate(SudokuGame $sudokuGame) : bool {
        $sudokuValidator = new SudokuValidator(new DefaultValidators());

        return $sudokuValidator->validateWithDefaultsValidators($sudokuGame);
    }

    private function validateWithDefaultsValidators(SudokuGame $sudokuGame) : bool {
        foreach ($this->validators as $validator) {
            return $validator->validateSudokuGame($sudokuGame);
        }
    }
}
