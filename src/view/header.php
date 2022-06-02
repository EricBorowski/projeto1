<?php

$titulos = [
    'inicio.php' => 'Inicio | Mangáska',
    'catalogo.php' => 'Catálogo | Mangáska',
    'comunidade.php' => 'Comunidade| Mangáska',
    'galria.php' => 'Galeria | Mangáska',
    'login.php' => 'Login | Mangáska',
    'cadastro.php' => 'Cadastro | Mangáska'

    #pode ter 'n' páginas
];

#limpa a url (ex.: /url.php?foo#bar => url.php)
$uri = (explode("/", $_SERVER['PHP_SELF']));

//var_dump(end($uri));

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulos[end($uri)] ?></title>
    <link rel="stylesheet" type="text/css" href="../paginas/assents/css/style.css">
    <link rel="stylesheet" type="text/css" href="../paginas/assents/bootstrap-5.1.3-dist/css/bootstrap.min.css">
</head>
<body>