<?php

spl_autoload_register(function($classe) {

    $prefixo = "App\\";

    $diretorio = __DIR__ . '/src/';

// Carregar classes contendo prefixo
   if (strncmp($prefixo, $classe, srtlen($prefixo)) !== 0) {
       return;
   };


// a partir desse ponto considerar arquivos que estao no diretorio
    $namespace = substr($classe, strlen($prefixo));

// funçao chamada para substituir barra literal
    $namespaceArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $namespace);
    $arquivo = $diretorio . $namespaceArquivo . '.php';
    var_dump($arquivo);
});
