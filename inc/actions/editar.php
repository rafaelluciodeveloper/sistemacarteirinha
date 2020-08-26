<?php

require_once('action/sessao.php');

require_once('./action/conexao.php');

$codigo = $_GET['codigo'];

$resultado = mysqli_query($conexao,"SELECT * FROM alunos where codigo=$codigo");

?>


<html lang="pt-BR">
<head>
    <title>Sistema Carteirinha 2016 - Principal</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css" />
       <link rel="stylesheet" href="lib/bootstrap/css/principal.css" />
</head>
    <body>
        <div class="container">
        <h4>Editando</h4>
        <form action="inc/salvar.php" method="POST" class="form-horizontal">
             <?php while($linha = mysqli_fetch_assoc($resultado)) : ?>
                <label>Matricula</label>
                <input type="text" name="matricula" required  value="<?php  echo $linha['matricula'];?>" class="form-control"/>
                <label>Nome</label>
                <input type="text" name="nome" required  value="<?php  echo $linha['nome'];?>" class="form-control"/>
                <label>Serie</label>
                <input type="text" name="serie" required  value="<?php  echo $linha['serie'];?>" class="form-control" />
                <label>Turma</label>
                <input type="text" name="turma" required  value="<?php  echo $linha['turma'];?>" class="form-control"/>
                <input type="hidden" value="<?php  echo $linha['codigo'];?>" name="codigo" />    
                <input type="submit" value="Salvar"  class="btn btn-success btn-lg btn-block"/>
            <?php endwhile; ?>
            </form> 
            </div>
           <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/bootstrap/js/jquery-1.7.1.min.js"></script>
</body>
</html>