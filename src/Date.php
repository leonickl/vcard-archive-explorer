<?php

namespace App;

class Date
{
    public function __construct(
        private string $date,
    ) {}

    public function parse() : ?array
    {
        if(empty(trim($this->date))) {
            return null;
        }

        if(str_contains($this->date, '--')) {
            return [null, substr($this->date, 2, 2), substr($this->date, 5, 2)];
        }
        
        if(str_contains($this->date, '-')) {
            return explode('-', $this->date);
        }

        $y = substr($this->date, 0, 4);
        $m = substr($this->date, 4, 2);
        $d = substr($this->date, 6, 2);

        return [$y, $m, $d];
    }

    public function format() : string
    {
        if($this->parse() === null) {
            return '';
        }

        [$y, $m, $d] = $this->parse();

        return "$d.$m.$y";
    }
}