<?php

namespace Classes;

class Cargo
{
    private $cargo;

    public function getCargo(): string
    {
        return $this->cargo;
    }

    public function setCargo(string $cargo): void
    {
        $this->cargo = $cargo;
    }

    public function isCargoDesenvolvedor(): bool
    {
        return strtolower($this->cargo) === "desenvolvedor";
    }
}
