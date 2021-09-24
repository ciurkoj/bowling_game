<?php
namespace Bowling;


class Game
{
    const FRAMES_PER_GAME = 10;
    const CONSTANT = ":Dasdad";
    protected array $rolls = [];
    public string $var = "constant val1111ue";

    public int $score = 0;
    function roll(int $pins): void
    {
        $this->rolls[] = $pins;
    }


    public function score(): int
    {
//        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            if ($this->isStrike($roll)) {

                $this->score += $this->pinCount($roll) + $this->strikeBonus($roll);
                $roll += 1;
                continue;
            }
            $this->score += $this->defaultFrameScore($roll);
            if ($this->isSpare($roll)) {
                $this->score += $this->spareBonus($roll);
            }
            $roll += 2;
        }
        return $this->score;
    }


     function isStrike(int $roll): bool
    {
        return $this->pinCount($roll) === 10;
    }

     function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) === 10;
    }

     function defaultFrameScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

     function strikeBonus(int $roll): int
    {
        return $this->pinCount($roll + 1) + $this->pinCount($roll + 2);
    }

     function spareBonus(int $roll): int
    {
        return $this->pinCount($roll + 2);
    }

    protected function pinCount(int $roll): int
    {
//        var_dump($this->rolls);
//        var_dump($roll);
        return $this->rolls[$roll]??0;
    }
}