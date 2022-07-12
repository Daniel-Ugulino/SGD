<?php
include "conexao.php";
include "post.php";
include "get.php";
include "put.php";
include "delete.php";

$get = new get();
$post = new post();
$delete = new delete();
$put = new put();

$data = json_decode(json_encode($_POST));


// function data_creator(){
//    $teste = var_dump($data);
//    foreach ($teste){

//    }
// }

// function insert(){
//     for ($i = 0;$i++;i<=5){
//         $obj = new stdClass()
//         $obj->nome = $teste[0]
//     }
// }

switch ($data->function){
    // case("getWorkers"):
    //     $post->create_funci($data);
    // break;

    case("getWorkers"):
        $get->getWorkers($data);
    break;

    case("getWorker"):
        $get->getWorker($data);
    break;
}

?>