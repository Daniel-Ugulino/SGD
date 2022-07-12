<?php
class get
{
    public function getWorkers($data)
    {
        try {
            $conexao = new conexao_banco();
            $conexao->conectar();
            $stm = $conexao->conectar()->prepare("select * from funcionario");
            // $stm = $conexao->conectar()->prepare("select * from view_employee_report order by :ordem");
            // $stm->bindparam("ordem", $data->ordem);
            $stm->execute();
            $data = new stdClass();
            $data->funcionarios = [];
            $data->funcionarios = $stm->fetchAll(PDO::FETCH_OBJ);
            echo (json_encode($data->funcionarios));
        } catch (Exception $e) {
            echo ($e);
        }
    }

    public function getWorker($data)
    {
        try {
            $conexao = new conexao_banco();
            $conexao->conectar();

            $stm[0] = $conexao->conectar()->prepare("select * from funcionario where id_funcionario = :id");
            $stm[1] = $conexao->conectar()->prepare("select id_atestado,cid,data,qtd_dias from relatorio_funcionario r LEFT JOIN atestado ats on r.fk_atestado = ats.id_atestado where r.fk_funcionario = :id");
            $stm[2] = $conexao->conectar()->prepare("select id_exame,exame,laboratorio,data_exame,resultado from relatorio_funcionario r LEFT JOIN exame_periodico exa on r.fk_exame = exa.id_exame where r.fk_funcionario = :id");
            $stm[3] = $conexao->conectar()->prepare("select id_vacinas,tipo,dose,data from relatorio_funcionario r LEFT JOIN vacinas vac on r.fk_vacina = vac.id_vacinas where r.fk_funcionario = :id");

            $funcionario = new stdClass();
        
            for ($i = 0; $i <= 3; $i++) {
                $stm[$i]->bindparam("id", $data->id);
                $stm[$i]->execute();
                switch ($i) {
                    case ($i == 1):
                        while ($fetch = $stm[0]->fetch(PDO::FETCH_OBJ)) {
                            $funcionario = $fetch;
                        }
                    case ($i == 1):
                        $funcionario->atestado = $stm[1]->fetchAll(PDO::FETCH_OBJ);
                    case ($i == 2):
                        $funcionario->exame = $stm[2]->fetchAll(PDO::FETCH_OBJ);
                    case ($i == 3):
                        $funcionario->vacina = $stm[3]->fetchAll(PDO::FETCH_OBJ);
                }
            }
            return json_encode($funcionario);
        } catch (Exception $error) {
            return $error;
        }
    }

    public function getReports($data)
    {
        $conexao = new conexao_banco();
        $conexao->conectar();
        $stm = $conexao->conectar()->prepare("select * from view_asu_report order by :ordem");
        $stm->bindparam("order", $data->order);
        $stm->execute();
        $data = new stdClass();
        $data->funcionario = [];
        while ($fetch = $stm->fetch(PDO::FETCH_OBJ)) {
            array_push($data->funcionarios, $fetch);
        }
        echo (json_encode($data));
    }

    public function getReport($data)
    {
        $conexao = new conexao_banco();
        $conexao->conectar();
        $stm = $conexao->conectar()->prepare("select * from view_asu_report where id_funcionario = :id");
        $stm->bindparam("id", $data->id);
        $stm->execute();
        $data = new stdClass();
        $data->funcionario = [];
        while ($fetch = $stm->fetch(PDO::FETCH_OBJ)) {
            array_push($data->funcionarios, $fetch);
        }
        echo (json_encode($data));
    }
}
