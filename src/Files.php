<?php

namespace App;

use Illuminate\Support\Collection;

class Files
{
    public const string STORAGE = __DIR__ . '/../storage';
    public const string VCARDS = self::STORAGE . '/vcards';

    public function people(): Collection
    {
        return collect(scandir(self::VCARDS))
            ->filter(fn(string $file) => !str_starts_with($file, '.') && str_ends_with($file, '.vcf'))
            ->map(File::make(...))
            ->flatMap(fn(File $file) => $file->people());
    }
}