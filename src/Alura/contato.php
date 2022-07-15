<?php

namespace App\udAlura;

class Contato
{
    private $email;
    private $endereco;
    private $cep;
    private $telefone;

    public function __constructor(string $email, string $endereco, string $cep, string $telefone)
    {
        $this-> email = $email;

        if($this->validateEmail($email) !== false) {
            $this->validateEmail($email);
        } else {
            $this->validateEmail("Email inválido.");
        }

        if($this->tvalidaTelefone($telefone)) {
            $this->setTelefone($telefone);
        } else {
            $this->setTelefone("Telefone inválido");
        }

        $this->endereco = $endereco;
        $this->cep = $cep;
    }

    private function validaTelefone(string $telefone)
    {
// retorna numero inteiro = preg_match
        return preg_match('/^[0-9]{4}-[0-9]{4}$/', $telefone, $encontrados);
    }

    private function setTelefone(string $telefone) : void
    {
        $this->telefone = $telefone;
    }
    private function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    public function getUsuario() : string
    {

// checa onde esta incluido o @ no email para marcar como posicao de inicio
        $posicaoArroba = strpos($this->email, '@');

        if($posicaoArroba === false) {
            return "Usuário invalido.";
        }

// usado para demonstar qual será a variavel a ser usada e o ponto inicial para uso.
        return substr($this->email, 0, $posicaoArroba);
    }
    private function validateEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getEnderecoCep() : string
    {
// string que é utilizada para agrupar informaçoes
        $enderecoCep = [$this->endereco, $this->cep];
        return  implode(" - ", $enderecoCep);
}
    public function getTelefone() : string
    {
        return $this->telefone;
    }
}