<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist\css\bootstrap-grid.min.css" />
</head>

<body>
    <div>
        <form action="" id="cad_user" method="POST">
            <input type="text" name="nome" id="username" placeholder="nome" />
            <input type="text" name="matricula" id="matricula" placeholder="matricula" />
            <input type="text" name="cpf" id="cpf" placeholder="cpf" />
            <input type="text" name="telefone" id="telefone" placeholder="telefone" />
            <input type="text" name="email" id="email" placeholder="email" />
            <input type="text" name="setor" id="setor" placeholder="setor" />
            <input type="text" name="fator_rh" id="fator_rh" placeholder="fator_rh" />
            <button type="submit" id="a">ENVIAR</button>
        </form>
    </div>
</body>

<script>
    document.getElementById("cad_user").addEventListener("submit", function(event) {
        event.preventDefault()
    });
</script>

</html>