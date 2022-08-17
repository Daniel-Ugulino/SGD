<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="bootstrap-5.1.3-dist\css\bootstrap-grid.min.css"
    />
  </head>

  <body>
    <div>
      <form action="multipart/form-data" id="cad_user">
        <input type="text" name="username" id="username" placeholder="nome" />
        <input
          type="text"
          name="matricula"
          id="matricula"
          placeholder="matricula"
        />
        <input type="text" name="cpf" id="cpf" placeholder="cpf" />
        <input
          type="text"
          name="telefone"
          id="telefone"
          placeholder="telefone"
        />
        <input type="text" name="email" id="email" placeholder="email" />
        <input type="text" name="setor" id="setor" placeholder="setor" />
        <input
          type="text"
          name="fator_rh"
          id="fator_rh"
          placeholder="fator_rh"
        />
        <button type="submit">ENVIAR</button>
      </form>
    </div>

    <button id="button" type="button">dados funcionario</button>

    <input type="number" name="" id="user" />

    <select name="" id="select">
      <option value="last_update">Ultima Atualização</option>
      <option value="nome">nome</option>
      <option value="cpf">Cpf</option>
      <option value="matricula">matricula</option>
      <option value="qtd_dias">Quantidade de dias</option>
    </select>

    <input type="text" id="search" />
    <div id="sla"></div>
  </body>

  <script src="js\jquery-3.6.0.min.js"></script>
  <script src="bootstrap-5.1.3-dist\js\bootstrap.bundle.min.js"></script>

  <script>
    $("#button").click(function () {
      $.ajax({
        type: "POST",
        url: "php/get.php?",
        data: { function: "getWorker", id: 2 },
        success: function (data) {
          console.log(data)
          let funcionarios = JSON.parse(data);
          $("#sla").html(JSON.stringify(funcionarios,null,'\t'))
        },
      });
    });

    $("#cad_user").submit(function (e) {
      e.preventDefault();
      let user_data = new FormData(document.querySelector("#cad_user"));
      user_data.append("function", "create_funci");

      const values = [...user_data.entries()];
      console.log(values);

      $.ajax({
        type: "POST",
        url: "php/index.php",
        data: user_data ,
        processData: false,
        cache: false,
        contentType: false,
        success: function (data) {
          let slaa = JSON.stringify(data,null,'\t')
          $("#sla").html(slaa)
          console.log(data);
        },
      });

    });
  </script>
</html>
