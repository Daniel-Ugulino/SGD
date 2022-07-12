<?php
class post
{
    public function postWorker($data)
    {
        try {
            $conexao = new conexao_banco();
            $conexao->conectar();
            $stm = $conexao->conectar()->prepare("Insert into funcionario values(DEFAULT,:name,:matricula,:cpf,:telefone,:email,:setor,now(),:fator_rh,true,now());");
            $stm->bindParam("name", $data->username);
            $stm->bindParam("matricula", $data->matricula);
            $stm->bindParam("cpf", $data->cpf);
            $stm->bindParam("telefone", $data->telefone);
            $stm->bindParam("email", $data->email);
            $stm->bindParam("setor", $data->setor);
            $stm->bindParam("fator_rh", $data->fator_rh);
            $stm->execute();
            echo("Usuario cadastrado");
        } catch (Exception $e) {
            echo ($e);
        }
    }

    public function create_user($data)
    {
        try{
            $conexao = new conexao_banco();
            $conexao->conectar();
            $stm = $conexao->conectar()->prepare("Insert into med_user values(DEFAULT,:username,:password,:cargo,:cpf,:email,true);");
            $stm->bindParam("id", $data->id);
            $stm->bindParam("tipo", $data->tipo);
            $stm->bindParam("dose", $data->dose);
            $stm->bindParam("data", $data->data);
            $stm->execute();
        }catch (Exception $e) {
            echo ($e);
        }
    }   
    
    public function create_atestado($data)
    {
        try{
        $conexao = new conexao_banco();
        $conexao->conectar();
        $stm = $conexao->conectar()->prepare("Insert into atestado values(DEFAULT,:id,:name,:senha,:cargo);");
        $stm->bindParam("id", $data->id);
        $stm->bindParam("name", $data->username);
        $stm->bindParam("senha", $data->senha);
        $stm->bindParam("cargo", $data->cargo);
        $stm->execute();
        // log(id,nome,função,data)
        }
        catch(Exception $e){
            echo($e);
        }
    }

    public function create_vacinas($data)
    {
        try{
            $conexao = new conexao_banco();
            $conexao->conectar();
            $stm = $conexao->conectar()->prepare("Insert into vacinas values(DEFAULT,:id,:tipo,:dose,:data);");
            $stm->bindParam("id", $data->id);
            $stm->bindParam("tipo", $data->tipo);
            $stm->bindParam("dose", $data->dose);
            $stm->bindParam("data", $data->data);
            $stm->execute();
        }catch (Exception $e) {
            echo ($e);
        }
    }
}
