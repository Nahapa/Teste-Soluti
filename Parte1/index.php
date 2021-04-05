<?php

require __DIR__ . '/vendor/autoload.php';

use Classes\Funcionario;

$funcionario = new Funcionario();
$funcionario->setCargo('desenvolvedor');
$funcionario->setCarreira('fullstack1');
echo "Cargo: {$funcionario->getCargo()}<br>";
echo "Carreira: {$funcionario->getCarreira()}<br>";
echo "Salario: {$funcionario->calcularSalario()}";
echo "<hr>";
$funcionario = new Funcionario();
$funcionario->setCargo('gerente');
$funcionario->setCarreira('gerente');
echo "Cargo: {$funcionario->getCargo()}<br>";
echo "Carreira: {$funcionario->getCarreira()}<br>";
echo "Salario: {$funcionario->calcularSalario()}";
echo "<hr>";
