<?php


namespace Sudoku\Model;


class SudokuGame
{
    /**
     * @var string
     */
    private $game;

    public function __construct(string $game) {
        $this->game = $game;
    }

    public function getAllRows(): array {
        $rawRows = $this->splitInRawRows();

        return $this->splitRawRowIntoElements($rawRows);
    }

    private function splitInRawRows(): array {
        return preg_split('/\n/', $this->game);
    }

    private function splitRawRowIntoElements(array $rawRows): array {
        $rows = [];

        foreach ($rawRows as $rawRow) {
            $rows[] = preg_split('/ /', $rawRow);
        }

        return $rows;
    }

    public function getAllColumns(): array {
        return null;
    }
}