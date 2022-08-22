<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Projeto Medicina</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/globals/reset.css" type="text/css" crossorigin="anonymous" />
    <script src="../Assets/globals/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/pages/Funcionario/css/style.css" type="text/css" />
    <title>Funcionarios</title>
</head>

<body>
    <div>
        <form action="" id="cad_user" method="POST">
            <input type="text" name="nome" id="username" placeholder="nome" value="<?php if (isset($data->nome)) echo ($data->nome); ?>" />
            <input type="number" name="matricula" id="matricula" placeholder="matricula" value="<?php if (isset($data->matricula)) echo ($data->matricula); ?>" />
            <input type="text" name="cpf" id="cpf" placeholder="cpf" value="<?php if (isset($data->cpf)) echo ($data->cpf); ?>" />
            <input type="text" name="telefone" id="telefone" placeholder="telefone" value="<?php if (isset($data->telefone)) echo ($data->telefone); ?>" />
            <input type="text" name="email" id="email" placeholder="email" value="<?php if (isset($data->email)) echo ($data->email); ?>" />
            <input type="date" name="nascimento" id="nascimento" placeholder="nascimento" value="<?php if (isset($data->nascimento)) echo ($data->nascimento); ?>" />
            <input type="text" name="setor" id="setor" placeholder="setor" value="<?php if (isset($data->setor)) echo ($data->setor); ?>" />
            <input type="text" name="fator_rh" id="fator_rh" placeholder="fator_rh" value="<?php if (isset($data->fator_rh)) echo ($data->fator_rh); ?>" />
            <button type="submit" id="a">ENVIAR</button>
        </form>
    </div>
</body>

</html>
<script>
    document.getElementById("cad_user").addEventListener("submit", function(event) {
        event.preventDefault();
        document.getElementById("cad_user").submit();
    });
</script>