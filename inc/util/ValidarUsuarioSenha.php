<?php

session_start();

require_once("Conexao.php");


$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);


$valida_sql = "SELECT * FROM usuarios where usuario = '$usuario' and senha ='$senha'";

$usuario = mysqli_fetch_assoc(mysqli_query($conexao, $valida_sql));


if (mysqli_num_rows(mysqli_query($conexao, $valida_sql)) > 0) {
    $_SESSION['logado'] = true;
    $_SESSION['nome_usuario'] = $usuario['nome'];
} else {
    unset($_SESSION['logado']);
    unset($_SESSION['nome_usuario']);
    header('Content-type: application/json');
    $data = array('retorno' => false);
    echo json_encode($data);
}
