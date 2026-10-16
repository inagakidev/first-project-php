<?php

namespace Clients;

use Exception;

class Client
{
    private $nome;
    private $email;

    public function __construct($nome, $email) {
        $this->setNome($nome);
        $this->setEmail($email);
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setNome(string $nome) {

        if (trim($nome) === "") {
            throw new \Exception('Erro ao inserir nome');
        }

        $this->nome = trim($nome);
    }

    public function setEmail(string $email) {
        if(trim($email) === '') {
            throw new \Exception('Erro ao inserir e-mail.');
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \Exception('E-mail inválido.');
        }

        $this->email = trim($email);

    }

    public function temMesmoEmail(client $outroCliente): bool {
        return $this->email === $outroCliente->getEmail();
    }


}
