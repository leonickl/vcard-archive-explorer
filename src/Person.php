<?php

namespace App;

readonly class Person
{
    private function __construct(private object $data)
    {
    }

    public static function make(object $data): static
    {
        return new static($data);
    }

    public function info(): string
    {
        $phones = count($this->phones()) === 0 ? '' : ' - ' . join(', ', $this->phones());
        $emails = count($this->email()) === 0 ? '' : ' - ' . join(', ', $this->email());
        $birthday = $this->birthday() === null ? '' : ' - ' . $this->birthday()->format();

        return $this->fullName() . $phones . $emails . $birthday;
    }

    public function phones(): array
    {
        return collect(array_merge(...array_values($this->data->phone ?? [])))
            ->map(Phone::make(...))
            ->map(fn(Phone $phone) => $phone->format())
            ->unique()
            ->toArray();
    }

    public function email(): array
    {
        return collect(array_merge(...array_values($this->data->email ?? [])))
            ->map(Mail::make(...))
            ->map(fn(Mail $mail) => $mail->format())
            ->unique()
            ->toArray();
    }

    public function birthday(): ?Date
    {
        return $this->data->birthday ?? null;
    }

    public function fullName(): string
    {
        return join(' ', array_filter([$this->data->firstname ?? null, $this->data->lastname ?? null]));
    }
}