<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/pages/Funcionario/css/style.css" type="text/css" />
    <title>Funcionarios</title>
</head>

<body>
    <main>
        <div>
            <a href="/projeto%20med/funcionarios/cadastro">cadastrar</a>
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
                        <tr>
                            <td><?php if (isset($funcionarios->id_funcionario)) echo $funcionarios->id_funcionario; ?></td>
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