<?php

require_once __DIR__ . '/vendor/autoload.php';

use Clients\Client;

// Teste 1: criar um cliente

$cliente1 = new Client(
    'Amanda',
    'Inagakidias@gmail.com'
);

echo $cliente1->getNome() . PHP_EOL;

// Teste 2: atualizar o nome

$cliente1->setNome('Lucas');

echo $cliente1->getNome() . PHP_EOL;

// Teste 3: tentar atualizar com nome vazio
try {
    $cliente1->setNome('');
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

// Teste 4: verificar se o nome anterior foi preservado

echo $cliente1->getNome() . PHP_EOL;

// Teste 5: comparar e-mails
$cliente2 = new Client(
    'Lidia',
    'amanda@example.com'
);

var_dump($cliente1->temMesmoEmail($cliente2));

// Teste 6: tentar atualizar com e-mail inválido

try {
    $cliente1->setEmail('email-invalido');
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

// Teste 7: verificar se o e-mail anterior foi preservado

echo $cliente1->getEmail() . PHP_EOL;

// Teste 8: teste de cadastro
echo PHP_EOL . 'Teste de cadastro' . PHP_EOL;

$cadastro = new \Clients\CadastroClientes();

$clienteA = new Client('Amanda', 'amanda@example.com');
$clienteB = new Client('Lucas', 'lucas@example.com');
$clienteDuplicado = new Client('Maria', 'amanda@example.com');

$cadastro->cadastrar($clienteA);
$cadastro->cadastrar($clienteB);

try {
    $cadastro->cadastrar($clienteDuplicado);
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

// Teste 9: lista de todos os clientes

foreach ($cadastro->listar() as $cliente) {
    echo $cliente->getNome() . PHP_EOL;
}