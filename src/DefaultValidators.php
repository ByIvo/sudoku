<?php


namespace Sudoku;


use Sudoku\Validators\BlockValidator;
use Sudoku\Validators\ColumnValidator;
use Sudoku\Validators\RowValidator;

class DefaultValidators {

    public function __construct() {}

    public function create(): array {
        return [
            new ColumnValidator(),
            new RowValidator(),
            new BlockValidator(),
        ];
    }
}