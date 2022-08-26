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



<script>
    $("#search").keyup(function() {
        $.ajax({
            type: "POST",
            url: "",
            data: {
                op: "card_control",
                Inidate: $("#start_date").val(),
                Fimdate: $("#end_date").val(),
                name: $("#name_filter").val()
            },
            datatype: "html",
            success: function(data) {
                $("#card_control").html(data);
                getdata();
            }
        });
        <?php $this->search()?>
    })
</script>