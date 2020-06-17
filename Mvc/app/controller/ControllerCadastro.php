<?php

namespace App\Controller;

use App\Model\ClassCadastro;
use Src\Classes\ClassRender;

class ControllerCadastro extends ClassCadastro{

    protected $id;
    protected $nome;
    protected $sexo;
    protected $cidade;

    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        if(count($this->parseUrl())==1){
            $render = new ClassRender();
            $render->setTitle("Cadastro");
            $render->setDescription("Faça seu cadastro");
            $render->setKeywords("cadastro de clientes, cadastro");
            $render->setDir("cadastro");
            $render->renderLayout();
        }
        
        
    }

    public function recVariaveis()
    {

        if(isset($_POST['id'])){
            if(is_array($_POST['id'])){
                $this->id = filter_var_array($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS);
            }else{
                $this->id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
            }            
        }else{
            $this->id = null;
        }

        if(isset($_POST['Nome'])){
            $this->nome = filter_input(INPUT_POST, 'Nome', FILTER_SANITIZE_SPECIAL_CHARS);
        }else{
            $this->nome = null;
        }

        if(isset($_POST['Sexo'])){
            $this->sexo = filter_input(INPUT_POST, 'Sexo', FILTER_SANITIZE_SPECIAL_CHARS);
        }else{
            $this->sexo = null;
        }

        if(isset($_POST['Cidade'])){
            $this->cidade = filter_input(INPUT_POST, 'Cidade', FILTER_SANITIZE_SPECIAL_CHARS);
        }else{
            $this->cidade = null;
        }
    }

    # Chamar o método de cadastro da ClassCadastro
    public function cadastrar()
    {
        $this->recVariaveis();
        $this->cadastroClientes($this->nome, $this->sexo, $this->cidade);
        echo "Cadastrado com sucesso!";       
    }

    # Chamar o método de seleciona da ClassCadastro
    public function selecionar()
    {
        $this->recVariaveis();
        $result = $this->selecionaClientes($this->nome, $this->sexo, $this->cidade);
        echo "
        <form name='FormDeletar' id='FormDeletar' action='".DIRPAGE."cadastro/deletar' method='POST'>
            <table border='1'>
            <tr>
                <td>Ação</td>
                <td>Nome</td>
                <td>Sexo</td>
                <td>Cidade</td>
            </tr>
        ";
        foreach($result as $table){
            echo "
            <tr>
                <td><input type='checkbox' id='id' name='id[]' value='$table[Id]'>
                <img rel='$table[Id]' src='".DIRIMG."edit.png' alt='Editar' width='15px' class='imgEdit'></td>
                <td>{$table['Nome']}</td>
                <td>$table[Sexo]</td>
                <td>$table[Cidade]</td>
            </tr>
        ";
        }
        echo "</table>
            <input type='submit' name='submit' value='DELETAR'>
            </form>";
    }

    # Deletar dados do DB
    public function deletar()
    {
        $this->recVariaveis();
        foreach($this->id as $id){
            $this->deletaClientes($id);
        }
        echo "Usuário(s) deletado(s)!";
    }

    # Puxando dados do DB
    public function puxaDB($id)
    {
        $this->recVariaveis();
        $result = $this->selecionaClientes($this->nome, $this->sexo, $this->cidade);
        foreach($result as $conf){
            if($conf['Id'] == $id){
                $nome=$conf['Nome'];
                $sexo=$conf['Sexo'];
                $cidade=$conf['Cidade'];
            }
        }
        echo "
        <form name='FormAtualiza' id='FormAtualiza' action='".DIRPAGE."cadastro/atualizar' method='POST'>
        <input type='hidden' name='id' id='id' value='$id'><br>
        NOME: <input type='text' name='Nome' id='Nome' value='{$nome}'>
        <br>
        SEXO: <select name='Sexo' id='Sexo'>
            <option value='{$sexo}'>{$sexo}</option>
            <option value='Masc'>MASCULINO</option>
            <option value='Fem'>FEMININO</option>
        </select>
        <br>
        CIDADE: <input type='text' name='Cidade' id='Cidade' value='{$cidade}'>
        <br>
        <input type='submit' value='ATUALIZAR'>
        </form>
        ";

    }

    # Atualizar Dados
    public function atualizar()
    {
        $this->recVariaveis();
        $this->atualizaClientes($this->id, $this->nome, $this->sexo, $this->cidade);
        echo "Atualizado com sucesso!";
    }

}