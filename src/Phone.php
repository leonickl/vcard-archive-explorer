<?php

namespace App;

class Phone
{
    private function __construct(
        private string $phone,
    ) {}

    public static function make(string $phone) : static
    {
        return new static($phone);
    }

    public function format() : string
    {
        $cleaned = preg_replace('/[^\d+]/', '', $this->phone);

        if(strlen($cleaned) > 0 && $cleaned[0] === '0') {
            $cleaned = '+49' . substr($cleaned, 1);
        }

        return $cleaned;
    }
}