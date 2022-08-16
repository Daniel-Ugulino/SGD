<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="Public\reset.css" />
    <link rel="stylesheet" href="index.css" /> -->
    <title>Funcionarios</title>
</head>

<style>
    div{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    table {
        display: flex;
        justify-content: center;
        flex-direction: column;
    }
    tr{
        display: flex;
        align-content: space-between;
    }
</style>

<body>
    <main>
        <div>
            <a href="/projeto%20med/Core/funcionario/cadastro">cadastrar</a>
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
                    foreach ($funcionario as $funcionario) { ?>
                        <tr>
                            <td><?php if (isset($funcionario->id_funcionario)) echo $funcionario->id_funcionario; ?></td>
                            <td><?php if (isset($funcionario->cpf)) echo $funcionario->cpf; ?></td>
                            <td><?php if (isset($funcionario->matricula)) echo $funcionario->matricula; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>