<?php

header('Content-type: application/json;charset=utf-8');

require_once("Conexao.php");

$operacao = $_REQUEST['operacao'];

switch ($operacao) {
    case 'cadastrar' :
        foreach ($_POST as $campo => $valor) {
            $$campo = $valor;
        }
        $SQL_CADASTRAR = "INSERT INTO alunos (matricula,nome,serie,turma) VALUES ('$matricula','$nome','$serie','$turma')";
        if (mysqli_query($conexao, $SQL_CADASTRAR)) {
            echo json_encode($status = array('retorno' => true));
        } else {
            echo json_encode($status = array('retorno' => false));
        }
        break;

    case 'alterar' :
        foreach ($_POST as $campo => $valor) {
            $$campo = $valor;
        }
        $SQL_ALTERAR = "UPDATE alunos SET matricula='$matricula',nome='$nome',serie='$serie',turma='$turma' WHERE id=$codigo";
        if (mysqli_query($conexao, $SQL_ALTERAR)) {
            echo json_encode($status = array('retorno' => true));
        } else {
            echo json_encode($status = array('retorno' => false));
        }

        break;

    case 'excluir' :
        $SQL_EXCLUIR = "DELETE FROM alunos WHERE id=$codigo";
        if (mysqli_query($conexao, $SQL_EXCLUIR)) {
            echo json_encode($status = array('retorno' => true));
        } else {
            echo json_encode($status = array('retorno' => false));
        }

        break;

    case 'selecionar' :
        $resultado = mysqli_query($conexao, "SELECT * FROM alunos WHERE id=" . $_GET['codigo']);
        $aluno = array('dados' => mysqli_fetch_row($resultado));
        echo json_encode($aluno);
        break;

    case 'imprimir' :
        break;
}

