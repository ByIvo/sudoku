<?php

namespace Sudoku\Validators;


use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Sudoku\Model\SudokuGame;

class RowValidatorTest extends TestCase {

    /**
     * @var RowValidator
     */
    private $rowValidator;

    public function setUp(): void {
        $this->rowValidator = new RowValidator();
    }

    public function testWhenTheRowContainsDuplication_shouldReturnFalse(): void {
        $sudokuGame = $this->mockSudokuGameWithLines([['1', '1', '3', '4', '5', '6', '7', '8', '9']]);

        $isValidRow = $this->rowValidator->validateSudokuGame($sudokuGame);

        $this->assertThat($isValidRow, self::isFalse());
    }

    public function testWhenTheRowIsValid_shouldReturnTrue(): void {
        $sudokuGame = $this->mockSudokuGameWithLines([['1', '2', '3', '4', '5', '6', '7', '8', '9']]);

        $isValidRow = $this->rowValidator->validateSudokuGame($sudokuGame);

        $this->assertThat($isValidRow, self::isTrue());
    }

    private function mockSudokuGameWithLines($lines): MockObject {
        $sudokuGame = $this->createMock(SudokuGame::class);
        $sudokuGame
            ->method('getAllRows')
            ->willReturn($lines);

        return $sudokuGame;
    }
}
