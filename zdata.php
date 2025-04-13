<?php

// Função para gerar senha com números apenas
function generateNumericPassword($length = 8) {
    $characters = '0123456789';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

// Função para gerar senha com números e letras (minúsculas e maiúsculas)
function generateAlphanumericPassword($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

// Função para gerar senha com números, letras e caracteres especiais
function generateComplexPassword($length = 12) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

// Função para gerar número aleatório
function rnd($length = 18) {
    $number = '';
    for ($i = 0; $i < $length; $i++) {
        $number .= rand(0, 9);
    }
    return $number;
}

// Função para gerar letras aleatórias (a-z, A-Z)
function generateRandomLetters($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $letters = '';
    for ($i = 0; $i < $length; $i++) {
        $letters .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $letters;
}

// Função para gerar checksum de uma string
function generateChecksum($data) {
    return hash('sha256', $data); // Utilizando sha256 como checksum
}

// Função para verificar o checksum de uma string
function verifyChecksum($data, $checksum) {
    return hash('sha256', $data) === $checksum;
}

// Função para gerar hash SHA1 de uma string
function generateSha1($data) {
    return sha1($data);
}

// Função para verificar hash SHA1 de uma string
function verifySha1($data, $hash) {
    return sha1($data) === $hash;
}

// Função para gerar hash MD5 de uma string
function generateMd5($data) {
    return md5($data);
}

// Função para verificar hash MD5 de uma string
function verifyMd5($data, $hash) {
    return md5($data) === $hash;
}



// Função de encriptação usando XOR com 2 chaves
function xorEncrypt($data, $key1, $key2) {
    $key1Length = strlen($key1);
    $key2Length = strlen($key2);
    $output = '';

    for ($i = 0; $i < strlen($data); $i++) {
        // Alterna entre as chaves, aplicando XOR
        if ($i % 2 == 0) {
            $output .= chr(ord($data[$i]) ^ ord($key1[$i % $key1Length]));
        } else {
            $output .= chr(ord($data[$i]) ^ ord($key2[$i % $key2Length]));
        }
    }

    return $output;
}

// Função de decriptação usando XOR com 2 chaves
function xorDecrypt($data, $key1, $key2) {
    // A decriptação é a mesma operação de encriptação (XOR é simétrico)
    return xorEncrypt($data, $key1, $key2);
}










?>
