<html lang="pt-BR">
    <head>
        <title>Sistema Carteirinha 2016</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="lib/htmlkickstart/css/kickstart.css" />
        <style>
            fieldset{
                width: 600px;
                height: 130px;
                text-align: center;
                margin-left:30%; 
                margin-right: 30%;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="lib/htmlkickstart/js/app.js"></script>
    </head>
    <body>
        <fieldset>
            <legend>Acessar Área Administrativa</legend>
            <form class="form-signin" id="login_form">
                <label for="usuario">Usuário</label>
                <input type="text" required autofocus  name="usuario">
                <label for="senha">Senha</label>
                <input type="password"  required name="senha">
                <button class="medium"><i class="fa fa-key" type="submit"></i> Entrar</button>
            </form>
            <p id="divmsg" style="color:red;"></p>
            <p>Emissor Carteirinha 2016 - 1.0</p>
        </fieldset>
        <script src="lib/htmlkickstart/js/kickstart.js"></script>
    </body>
</html>