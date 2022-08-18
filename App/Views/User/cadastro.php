<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="main">
        <form action="" id="cadastrar" method="POST">
            <input type="text" name="username" id="">
            <input type="text" name="password" id="">
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
<script>
    $("#cadastrar").submit(function(e) {
    var data = new FormData(document.getElementById("cadastrar"));
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "",
        data: data,
        processData: false,
        cache: false,
        contentType: false,
        success: function(data) {
           alert("Usuario Criado");
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert("ERROR:" + xhr.responseText + " - " + thrownError);
        }
    });
});

</script>


</html>