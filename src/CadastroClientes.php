<?php

namespace Clients;

class CadastroClientes
{
    private array $clientes = [];

    public function cadastrar(Client $novoCliente): void {
        foreach ($this->clientes as $cliente) {
            if ($cliente->temMesmoEmail($novoCliente)) {
                throw new \Exception('Este e-mail já está cadastrado');
            }
        }

        $this->clientes[] = $novoCliente;
    }

    public function listar(): array {
      return $this->clientes;
    }
}