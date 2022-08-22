<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Projeto Medicina</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/globals/reset.css" type="text/css" crossorigin="anonymous" />
    <script src="Assets/globals/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="Assets/pages/Funcionario/css/style.css" type="text/css" />
    <title>Funcionarios</title>
</head>

<body>
    <main>
        <div>
            <a href="/SGM/funcionarios/form">cadastrar</a>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome</th>
                        <th>CPF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($funcionarios as $funcionarios) { ?>
                        <tr id=<?php if (isset($funcionarios->id_funcionario)) echo $funcionarios->id_funcionario; ?>>
                            <td><?php if (isset($funcionarios->nome)) echo $funcionarios->nome; ?></td>
                            <td><?php if (isset($funcionarios->cpf)) echo $funcionarios->cpf; ?></td>
                            <td><?php if (isset($funcionarios->matricula)) echo $funcionarios->matricula; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>