<?php

namespace App;

use Illuminate\Support\Collection;

class Files
{
    public static function directory(): string
    {
        return DIRECTORY;
    }

    public function people(): Collection
    {
        return collect(scandir(self::directory()))
            ->filter(fn(string $file) => !str_starts_with($file, '.') && str_ends_with($file, '.vcf'))
            ->map(File::make(...))
            ->flatMap(fn(File $file) => $file->people());
    }
}