<?php

namespace Sudoku\Validators;


use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Sudoku\Model\SudokuGame;

class ColumnValidatorTest extends TestCase {

    private $columnValidator;

    public function setUp() {
        $this->columnValidator = new ColumnValidator();
    }

    public function testWhenTheColumnContainsDuplication_shouldReturnFalse(): void {
        $sudokuGame = $this->mockSudokuGameWithColumns([['9', '2', '3', '4', '5', '6', '7', '8', '9']]);

        $validGame = $this->columnValidator->validateAllColumnsIn($sudokuGame);

        $this->assertThat($validGame, $this->isFalse());
    }

    public function testWhenTheColumnIsValid_shouldReturnTrue(): void {
        $sudokuGame = $this->mockSudokuGameWithColumns([['1', '2', '3', '4', '5', '6', '7', '8', '9']]);

        $validGame = $this->columnValidator->validateAllColumnsIn($sudokuGame);

        $this->assertThat($validGame, $this->isTrue());
    }

    private function mockSudokuGameWithColumns(array $columns): MockObject {
        $sudokuGame = $this->createMock(SudokuGame::class);
        $sudokuGame
            ->method('getAllColumns')
            ->willReturn($columns);
        return $sudokuGame;
    }
}
