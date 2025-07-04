<?php

function cadastrarCliente($nome, $email, $telefone) {
    global $clientes;

    // Validação: Verificar se o e-mail já está cadastrado
    foreach ($clientes as $cliente) {
        if ($cliente['email'] === $email) {
            echo "Erro: O email $email já está cadastrado.\n";
            return;
        }
    }

    // Validação: Verificar se todos os campos foram preenchidos
    if (empty($nome) || empty($email) || empty($telefone)) {
        echo "Erro: Todos os campos do cliente devem ser preenchidos.\n";
        return;
    }

    // Cadastrar o cliente
    $clientes[] = ['nome' => $nome, 'email' => $email, 'telefone' => $telefone];
    echo "Cliente cadastrado com sucesso: $nome ($email)\n";
    return $clientes;
}