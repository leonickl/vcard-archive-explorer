<?php

namespace App;

use JeroenDesloovere\VCard\VCardParser;

readonly class File
{
    private function __construct(
        private string $file,
    )
    {
    }

    public static function make(string $file): static
    {
        return new static($file);
    }

    private function path(): string
    {
        return Files::directory() . '/' . $this->file;
    }

    public function people(): array
    {
        $parser = VCardParser::parseFromFile($this->path());

        return array_map(Person::make(...), $parser->getCards());
    }
}