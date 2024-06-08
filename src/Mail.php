<?php

namespace App;

readonly class Mail
{
    private function __construct(
        private string $mail,
    )
    {
    }

    public static function make(string $mail): static
    {
        return new static($mail);
    }

    public function format(): string
    {
        return strtolower($this->mail);
    }
}