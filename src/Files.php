<?php

namespace App;

use Illuminate\Support\Collection;

class Files
{
    public const STORAGE = __DIR__ . '/../storage';
    public const VCARDS = self::STORAGE . '/vcards';

    private function list(string $dir) : Collection
    {
        return collect(scandir($dir))
            ->filter(fn(string $file) => !str_starts_with($file, '.') && str_ends_with($file, '.vcf'));
    }

    public function people() : Collection
    {
        return $this->list(self::VCARDS)
            ->map(File::make(...))
            ->flatMap(fn(File $file) => $file->people());
    }
}