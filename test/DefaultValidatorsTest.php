<?php

namespace Test\Sudoku;


use PHPUnit\Framework\TestCase;
use Sudoku\DefaultValidators;
use Sudoku\Validators\BlockValidator;
use Sudoku\Validators\ColumnValidator;
use Sudoku\Validators\RowValidator;

class DefaultValidatorsTest extends TestCase
{
    public function testWhenCreateDefaultValidators_shouldContainAllValidators(): void {
        $defaultValidators = new DefaultValidators();

        $this->assertThat($defaultValidators->create(), $this->equalTo([
            new ColumnValidator(),
            new RowValidator(),
            new BlockValidator(),
        ]));
    }
}
