<form name="FormCadastro" id="FormCadastro" action="<?php echo DIRPAGE.'cadastro/cadastrar';?>" method="POST">
    NOME: <input type="text" name="Nome" id="Nome">
    <br>
    SEXO: <select name="Sexo" id="Sexo">
        <option value="">Selecione</option>
        <option value="Masc">MASCULINO</option>
        <option value="Fem">FEMININO</option>
    </select>
    <br>
    CIDADE: <input type="text" name="Cidade" id="Cidade">
    <br>
    <input type="submit" value="CADASTRAR">
</form>
<br>
<hr><hr>
<h1>SELEÇÃO DE DADOS</h1>
<br>
<form name="FormSeleciona" id="FormSeleciona" action="<?php echo DIRPAGE.'cadastro/selecionar';?>" method="POST">
    NOME: <input type="text" name="Nome" id="Nome">
    <br>
    SEXO: <select name="Sexo" id="Sexo">
        <option value="">Selecione</option>
        <option value="Masc">MASCULINO</option>
        <option value="Fem">FEMININO</option>
    </select>
    <br>
    CIDADE: <input type="text" name="Cidade" id="Cidade">
    <br>
    <input type="submit" value="PESQUISAR">
</form>

<!-- Será responsável por receber a tabela de pesquisa-->

<div class="Resultado" style="width: 100%; height: 200px; background: pink;"></div>

<br>
<hr><hr>
<h1>FORMULÁRIO DE ATUALIZAÇÕES</h1>
<br>

<div class="ResultadoFormulario"></div>