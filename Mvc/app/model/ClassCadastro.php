<?php

namespace App\Model;

class ClassCadastro extends ClassConexao{

    private $data;

    # Método para cadastrar os clientes no sistema
    protected function cadastroClientes($nome, $sexo, $cidade)
    {
        $id = null;

        $this->data = $this->conectaDB()->prepare("INSERT INTO mvc VALUES (:id, :nome, :sexo, :cidade)");
        $this->data->bindParam(":id", $id, \PDO::PARAM_INT);
        $this->data->bindParam(":nome", $nome, \PDO::PARAM_STR);
        $this->data->bindParam(":sexo", $sexo, \PDO::PARAM_STR);
        $this->data->bindParam(":cidade", $cidade, \PDO::PARAM_STR);
        $this->data->execute();
    }

    # Método para cadastrar os clientes no sistema
    protected function selecionaClientes($nome, $sexo, $cidade)
    {
        $nome = '%'.$nome.'%';
        $sexo = '%'.$sexo.'%';
        $cidade = '%'.$cidade.'%';
        $fetch = $this->data = $this->conectaDB()->prepare("SELECT * FROM mvc WHERE nome LIKE :nome AND sexo LIKE :sexo AND cidade LIKE :cidade");
        $fetch->bindParam(":nome", $nome, \PDO::PARAM_STR);
        $fetch->bindParam(":sexo", $sexo, \PDO::PARAM_STR);
        $fetch->bindParam(":cidade", $cidade, \PDO::PARAM_STR);
        $fetch->execute();

        $i = 0;
        while($array = $fetch->fetch(\PDO::FETCH_ASSOC)){
            $data[$i] = [
                'Id' => $array['id'],
                'Nome' => $array['nome'],
                'Sexo' => $array['sexo'],
                'Cidade' => $array['cidade']
            ];
            $i++;
        }

        return $data;
    }

    # Deletar direto no DB
    protected function deletaClientes($id)
    {
        $this->data = $this->conectaDB()->prepare("DELETE FROM mvc WHERE id = :id");
        $this->data->bindParam(":id", $id, \PDO::PARAM_INT);
        $this->data->execute();
    }

    # Atualizar direto no DB
    protected function atualizaClientes($id, $nome, $sexo, $cidade)
    {
        $this->data = $this->conectaDB()->prepare("UPDATE mvc SET Nome = :nome, Sexo = :sexo, Cidade = :cidade WHERE id = :id");
        $this->data->bindParam(":id", $id, \PDO::PARAM_INT);
        $this->data->bindParam(":nome", $nome, \PDO::PARAM_STR);
        $this->data->bindParam(":sexo", $sexo, \PDO::PARAM_STR);
        $this->data->bindParam(":cidade", $cidade, \PDO::PARAM_STR);
        $this->data->execute();
    }
}

