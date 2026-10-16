<?php

require_once __DIR__ . '/vendor/autoload.php';

use Clients\Client;

$cliente = new Client(
    'Amanda',
    'anagaki@gmail.com',
);

echo $cliente->getNome();