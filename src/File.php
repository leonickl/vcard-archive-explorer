<?php

namespace App;

use JeroenDesloovere\VCard\VCardParser;

class File
{
    private function __construct(
        private string $file,
    ) {}

    public static function make(string $file): static
    {
        return new static($file);
    }

    private function path() : string
    {
        return Files::VCARDS . '/' . $this->file;
    }

    public function readFile() : string
    {
        return file_get_contents($this->path());
    }

    public function people() : array
    {
        $parser = VCardParser::parseFromFile($this->path());

        return array_map(Person::make(...), $parser->getCards());
    }
}