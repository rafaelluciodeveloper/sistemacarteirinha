<?php
require_once('./inc/actions/Sessao.php');
require_once('./inc/actions/Conexao.php');

$resultado = mysqli_query($conexao, "SELECT * FROM alunos");
?>
<html lang="pt-BR">
    <head>
        <title>Sistema Carteirinha 2016 - Principal</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="lib/htmlkickstart/css/kickstart.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="lib/htmlkickstart/js/app.js"></script>
    </head>
    <body>
        <fieldset style="width: 1024px; margin-left: 15%;">
            <legend> Emissor Carteirinha 1.0 </legend>
            <fieldset>
                <legend>Usuário Logado</legend>
                <div class="col_10">
                    <p style="color: blue;"><?php echo $nome_usuario; ?></p>
                </div>
                <div class="col_2">
                    <p style="color: blue;text-align: right;"><i class="fa fa-sign-out"></i><a href="inc/sessao_util.php?encerrar=true.php" >Sair</a></p>
                </div>

            </fieldset>  
            <fieldset>
                <legend>Pesquisa</legend>
                <div class="col_12">
                    <select style="height: 36px !important;">
                        <option value="matricula">Por Matricula</option>
                        <option value="nome">Por Nome</option>
                    </select>
                    <input type="text" name="valor"  class="col_8" style="height: 36px !important;" />
                    <button class="square medium" type="submit" ><i class="fa fa-search"></i> Pesquisar</button>
                </div>
            </fieldset>  
            <fieldset>
                <legend>Alunos</legend>
                <table class="striped" style="font-size: 17px;">
                    <thead>
                        <tr>
                            <td><b>Matricula</b></td>
                            <td><b>Nome</b></td>
                            <td><b>Ações</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($linha = mysqli_fetch_assoc($resultado)) : ?>
                            <tr>
                                <td><?php echo $linha['matricula']; ?></td>
                                <td><?php echo $linha['nome']; ?></td>
                                <td>
                                    <a onclick="selecionar(<?php echo $linha['id']; ?>);" title="Editar"><i class="fa fa-edit"></i></a> 
                                    <a title="Excluir" ><i class="fa fa-trash"></i></a>
                                    <a href="inc/imprimir.php?codigo=<?php echo $linha['id']; ?>" title="Imprimir Carteirinha"><i class="fa fa-print"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </fieldset>
            <fieldset>
                <legend>Cadastro</legend>
                <form class="vertical" id="cadastro_form">
                    <div class="col_1">
                        <label>Matricula</label>
                        <input type="text" name="matricula" required class="form-control" id="matricula" />
                    </div>
                    <div class="col_6">
                        <label>Nome</label>
                        <input type="text" name="nome" required class="form-control" id="nome"/>
                    </div>
                    <div class="col_4">
                        <label>Serie</label>
                        <select name="serie" id="serie">
                            <option value="-" selected="">-------------------------</option>
                            <option value="Educação Infantil Berçario">Educação Infantil Berçario</option>
                            <option value="Educação Infatil N1">Educação Infatil N1</option>
                            <option value="Educação Infatil N2">Educação Infatil N2</option>
                            <option value="Educação Infatil N3">Educação Infatil N3</option>
                            <option value="Ensino Fundamental 1° Ano">Ensino Fundamental 1° Ano</option>
                            <option value="Ensino Fundamental 2° Ano">Ensino Fundamental 2° Ano</option>
                            <option value="Ensino Fundamental 3° Ano">Ensino Fundamental 3° Ano</option>
                            <option value="Ensino Fundamental 4° Ano">Ensino Fundamental 4° Ano</option>
                            <option value="Ensino Fundamental 5° Ano">Ensino Fundamental 5° Ano</option>
                            <option value="Ensino Fundamental 6° Ano">Ensino Fundamental 6° Ano</option>
                            <option value="Ensino Fundamental 7° Ano">Ensino Fundamental 7° Ano</option>
                            <option value="Ensino Fundamental 8° Ano">Ensino Fundamental 8° Ano</option>
                            <option value="Ensino Fundamental 9° Ano">Ensino Fundamental 9° Ano</option>
                            <option value="Ensino Médio 1° Ano">Ensino Médio 1° Ano</option>
                            <option value="Ensino Médio 2° Ano">Ensino Médio 2° Ano</option>
                            <option value="Ensino Médio 3° Ano">Ensino Médio 3° Ano</option>   
                        </select>
                    </div>
                    <div class="col_1">
                        <label>Turma</label>
                        <input type="text" name="turma" required class="form-control" id="turma" />
                       
                    </div>
                    <input type="hidden" name="operacao" value="cadastrar" id="operacao" />
                    <input type="hidden" name="codigo" value="" id="codigo" />
                    <div class="col_12" style="text-align: center;">
                        <button class="medium" type="submit"><i class="fa fa-plus"></i> Salvar</button>
                        <button class="medium" type="reset"><i class="fa fa-eraser"></i> Limpar</button>
                    </div>
                </form>
            </fieldset>
            <footer class="footer">
                <div class="container" style="text-align:center;">
                    <p class="text-muted">www.sistemacarteirinha.com.br - 1.0
                </div>
            </footer>
        </fieldset>

        <script src="lib/htmlkickstart/js/kickstart.js"></script>
    </body>
</html>