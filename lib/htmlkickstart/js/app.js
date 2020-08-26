$(document).ready(function () {
    $('#login_form').submit(function () {
        var dados = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "./inc/util/ValidarUsuarioSenha.php",
            data: dados,
            success: function (data)
            {
                alert(data);

                if (data['retorno'] === false) {
                    $('#divmsg').text("Usuário/Senha Incorretos!");
                } else {
                    window.location.replace("./principal.php");
                }
            }
        });
        return false;
    });

    $('#cadastro_form').submit(function () {
        var dados = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "./inc/actions/Aluno.php",
            data: dados,
            success: function (data)
            {
                if (data['retorno'] === true) {
                    alert("Operação Efetuada com Sucesso!");
                } else {
                    alert("Operação Não Efetuada com Sucesso!");
                }
                resetForm();
            }
        });
        return false;
    });


});

function selecionar(valor) {
    $.get("./inc/actions/Aluno.php", {codigo: valor, operacao: 'selecionar'}, function (resposta) {
        $.each(resposta, function (index, value) {
            $('#codigo').val(value[0]);
            $('#matricula').val(value[1]);
            $('#matricula').focus();
            $('#nome').val(value[2]);
            $('#serie').val(value[3]);
            $('#turma').val(value[4]);
            $('#operacao').val('alterar');

        });

    });
}


function resetForm() {
    $('#codigo').val('');
    $('#matricula').val('');
    $('#nome').val('');
    $('#serie').val('-');
    $('#turma').val('');
    $('#operacao').val('cadastrar');
}


function excluir(valor) {
    $.get("./inc/actions/Aluno.php", {codigo: valor, operacao: 'excluir'}, function (resposta) {
    });

}