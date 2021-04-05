<?php

namespace Classes;

class Carreira extends Cargo
{
    private $carreira;

    public function getCarreira(): string
    {
        return $this->carreira;
    }

    public function setCarreira(string $carreira): void
    {
        $this->carreira = $carreira;
    }

    public function isCarreiraFullStack1(): bool
    {
        return strtolower($this->carreira) === "fullstack1";
    }

    public function isCarreiraFullStack2(): bool
    {
        return strtolower($this->carreira) === "fullstack2";
    }

    public function isCarreiraFullStack3(): bool
    {
        return strtolower($this->carreira) === "fullstack3";
    }

    public function isCarreiraGerente(): bool
    {
        return strtolower($this->carreira) === "gerente";
    }
}
