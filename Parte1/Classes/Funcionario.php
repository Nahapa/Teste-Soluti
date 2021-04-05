<?php

namespace Classes;

class Funcionario extends Carreira
{
    private $nome;

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function calcularSalario(): float
    {
        if ($this->isCargoDesenvolvedor()) {
            if ($this->isCarreiraFullStack1()) {
                return 2000.00;
            } elseif ($this->isCarreiraFullStack2()) {
                return 3000.00;
            } elseif ($this->isCarreiraFullStack2()) {
                return 4000.00;
            } else {
                var_dump("Carreira não encontrada");
                return 0;
            }
        } elseif ($this->isCarreiraGerente()) {
            return 6000.00;
        } else {
            var_dump("Cargo não encontrado");
            return 0;
        }
    }
}
