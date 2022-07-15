<?php

namespace  App\Alura;

class Usuario
{
    private $nome;
    private $sobrenome;
    private $senha;
    private $tratamento;

    public function __constructor (string $nome, string $senha, string $genero) {
        $this->setNomeSobrenome($nome);
        $this->validaSenha($senha);

        $this->adicionarTratamentoAoSobrenome($nome, $genero);
    }

    private function adicionarTratamentoAoSobrenome(string $nome, string $genero)
    {
        if($genero === 'M') {
//          funcao usada para encontrar substituicao e substituir por outra expressao
            $this->tratamento = preg_replace('/(\w+)\b/', 'Sr.', $nome, 1);
        }
        if($genero === 'F') {
            $this->tratamento = preg_replace('/(\w+)\b/', 'Sra.', $nome, 1);
        }
    }

    private function setNomeSobrenome(string $nome)
    {
        // definir dados para utilização no formulário
        $nomeSobrenome = explode(" ", $nome, 2);

//criado statement if para checar se existe informaçoes para nome e sobrenome, se os campos estão ou não vazios.
        if($nomeSobrenome[0] === "") {
            $this->nome = "Nome inválido.";
        } else {
            $this->nome = $nomeSobrenome[0];
        }

        if($nomeSobrenome[1] === null) {
            $this->sobrenome = "Sobrenome inválido.";
        } else {
            $this->sobrenome = $nomeSobrenome[1];
        }
    }

// chamar função para gerar getters
    public function getNome() : string
    {
      return $this->nome;
    }

    public function getSobrenome() : string
    {
        return $this->sobrenome;
    }

    public function getSenha() : string
    {
        return $this->senha;
    }
    private function validaSenha(string $senha) : void
    {
        //retira caracteres como espaços do inicio e fim da string = trim().
        $tamanhoSenha = strlen(trim($senha));

        if($tamanhoSenha > 6) {
            $this->senha = $senha;
        } else {
            $this->senha = "Senha inválida";
        }
    }
    public function getTratamento(string $tratamento)
    {
        return $this->tratamento;
    }
}

