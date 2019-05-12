<?php


namespace Sudoku;


use Sudoku\Model\SudokuGame;
use Sudoku\Validators\ColumnValidator;
use Sudoku\Validators\RowValidator;
use Sudoku\Validators\Validator;

class SudokuValidator {

    /**
     * @var array
     */
    private $validators;

    private function __construct(array $validators) {
        $this->validators = $validators;
    }

    public static function validate(SudokuGame $sudokuGame) : bool {
        $sudokuValidator = new SudokuValidator([
            new ColumnValidator(),
            new RowValidator()
        ]);

        return $sudokuValidator->validateWithDefaultsValidators($sudokuGame);
    }

    private function validateWithDefaultsValidators(SudokuGame $sudokuGame) : bool {
        foreach ($this->validators as $validator) {
            return $validator->validateSudokuGame($sudokuGame);
        }
    }
}