<?php

namespace App;

class App
{
    public static function run(): string
    {
        return (new Files)->people()
            ->sortByDesc(fn(Person $p) => $p->fullName())
            ->unique(fn(Person $p) => $p->fullName())
            ->reverse()
            ->values()
            ->map(fn(Person $p, int $i) => $i . ': ' . $p->info())
            ->join(PHP_EOL);
    }
}