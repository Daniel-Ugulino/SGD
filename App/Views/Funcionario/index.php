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
            <div>
                <select name="column" id="column">
                    <option value="nome">nome</option>
                    <option value="cpf">cpf</option>
                    <option value="matricula">matricula</option>
                </select>
                <input type="text" name="field" id="search" placeholder="digite o texto">
                <input type="button" value="a" id="serch_bt" placeholder="clica">
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Matricula</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->funcionarios as $funcionarios) { ?>
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

<script>
    $("#search").keyup(function() {
        $.ajax({
            type: "POST",
            url: "",
            data: {
                search: true,
                column: $("#column").val(),
                field: $("#search").val()
            },
            success: function(data) {
                $('tbody').empty();
                const content = JSON.parse(data)
                content.map(addItens);
                function addItens(item) {
                    $('tbody').append("<tr id=" + item.id_funcionario + "> <td>" + item.nome + "</td> <td>" + item.cpf + "</td> <td>" + item.matricula + "</td></tr>")
                    //    $('tbody').append("<td>" + item.nome + "</td>")
                    //    $('tbody').append("<td>" + item.cpf + "</td>")
                    //    $('tbody').append("<td>" + item.matricula + "</td></tr>")

                }
            }
        });
    })
</script>