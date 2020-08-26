<?php

require_once('../action/sessao.php');

require_once('conexao.php');

$codigo = $_GET['codigo'];



if(mysqli_query($conexao,$SQL_EXCLUIR)){
   header('Location: ../ok.php');
}else{
    header('Location: ../erro.php');
}


?>