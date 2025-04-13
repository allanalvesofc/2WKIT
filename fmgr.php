<?php

// Função para escrever conteúdo em um arquivo
function writefile($file, $content)
{
    // Abre o arquivo para escrita (sobrescreve se já existir)
    $fileHandle = fopen($file, 'w');
    if ($fileHandle === false) {
        return "Erro ao abrir o arquivo.";
    }

    // Escreve o conteúdo no arquivo
    fwrite($fileHandle, $content);

    // Fecha o arquivo
    fclose($fileHandle);

    return "Conteúdo escrito com sucesso!";
}

// Função para ler conteúdo de um arquivo (especificando a quantidade de linhas a serem lidas)
function readfileW($file, $lines)
{
    // Verifica se o arquivo existe
    if (!file_exists($file)) {
        return "Arquivo não encontrado.";
    }

    // Abre o arquivo para leitura
    $fileHandle = fopen($file, 'r');
    if ($fileHandle === false) {
        return "Erro ao abrir o arquivo.";
    }

    $fileContent = [];
    $lineCount = 0;

    // Se a quantidade de linhas for -1, lê o arquivo inteiro
    if ($lines == -1) {
        // Lê o arquivo inteiro e retorna como uma string
        $fileContent = fread($fileHandle, filesize($file));
    } else {
        // Se $lines for maior que 0, lê as linhas até atingir a quantidade desejada
        while (!feof($fileHandle) && $lineCount < $lines) {
            $fileContent[] = fgets($fileHandle);
            $lineCount++;
        }
    }

    // Fecha o arquivo
    fclose($fileHandle);

    return $fileContent;
}

// Função para ler um arquivo .ini e retornar os parâmetros por seção
function readIniFile($file)
{
    // Verifica se o arquivo existe
    if (!file_exists($file)) {
        return null;
    }

    // Lê o arquivo .ini e retorna um array associativo
    $data = parse_ini_file($file, true);  // true para ler as seções também

    if ($data === false) {
        return null;
    }

    return $data;
}

// Função para escrever parâmetros em um arquivo .ini
function writeIniFile($file, $data)
{
    // Abre o arquivo .ini para escrita
    $fileHandle = fopen($file, 'w');
    if ($fileHandle === false) {
        return "Erro ao abrir o arquivo .ini para escrita.";
    }

    // Escreve cada seção e seus parâmetros no arquivo
    foreach ($data as $section => $params) {
        fwrite($fileHandle, "[$section]\n");  // Escreve o nome da seção

        foreach ($params as $key => $value) {
            fwrite($fileHandle, "$key = \"$value\"\n");  // Escreve o parâmetro
        }
        fwrite($fileHandle, "\n");  // Adiciona uma linha em branco entre as seções
    }

    // Fecha o arquivo
    fclose($fileHandle);

    return 1;
}



?>