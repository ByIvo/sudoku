<?php

namespace Test\Sudoku\Validators;


use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Sudoku\Model\SudokuGame;
use Sudoku\Validators\BlockValidator;

class BlockValidatorTest extends TestCase {
    /**
     * @var BlockValidator
     */
    private $blockValidator;

    protected function setUp() {
        $this->blockValidator = new BlockValidator();
    }

    public function testWhenTheBlockContainsDuplication_shouldReturnFalse(): void {
        $sudokuGame = $this->mockSudokuGameWithBlocks([['1', '2', '3', '4', '5', '6', '7', '8', '8']]);

        $validGame = $this->blockValidator->validateSudokuGame($sudokuGame);

        $this->assertThat($validGame, $this->isFalse());
    }

    public function testWhenTheBlockHaveNoDuplications_shouldReturnTrue(): void {
        $sudokuGame = $this->mockSudokuGameWithBlocks([['1', '2', '3', '4', '5', '6', '7', '8', '9']]);

        $validGame = $this->blockValidator->validateSudokuGame($sudokuGame);

        $this->assertThat($validGame, $this->isTrue());
    }

    private function mockSudokuGameWithBlocks($blocks): MockObject {
        $sudokuGame = $this->createMock(SudokuGame::class);

        $sudokuGame
            ->method('getAllBlocks')
            ->willReturn($blocks);
        return $sudokuGame;
    }
}
