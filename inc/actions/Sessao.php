<?php

session_start();

if ((isset($_SESSION['logado'])) and ( $_SESSION['logado'] == true)) {
    $nome_usuario = $_SESSION['nome_usuario'];
} else {
    header('Location: ./index.php');
    echo "Nao Logou";
}

if ((isset($_GET['encerrar'])) and ( $_GET['encerrar'] == true)) {
    session_start();
    session_destroy();

    unset($_SESSION['logado']);
    unset($_SESSION['nome_usuario']);

    header('Location: ../index.php');
}


