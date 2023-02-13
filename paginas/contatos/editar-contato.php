<?php
$idContato = $_GET["idContato"];

$sql = "SELECT * FROM tb_contatos WHERE id_Contato = {$idContato}";

$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar registro." . mysqli_error($conexao));

$dados = mysqli_fetch_assoc($rs);

?>

<header>
    <h3>editar contato</h3>
</header>

<div>
    <form action="index.php?menuop=atualizar-contato" method="post">
        <div>
            <label for="idContato">ID</label>
            <input type="text" name="idContato" value="<?= $dados["id_Contato"] ?>">
        </div>

        <div>
            <label for="nomeContato">Nome</label>
            <input type="text" name="nomeContato"  value="<?= $dados["nome_Contato"] ?>">
        </div>

        <div>
            <label for="emailContato">E-mail</label>
            <input type="email" name="emailContato" value="<?= $dados["email_Contato"] ?>">
        </div>

        <div>
            <label for="telefoneContato">Telefone</label>
            <input type="text" name="telefoneContato" value="<?= $dados["telefone_Contato"] ?>">
        </div>

        <div>
            <label for="enderecoContato">Endereço</label>
            <input type="text" name="enderecoContato" value="<?= $dados["endereco_Contato"] ?>">
        </div>

        <div>
            <label for="sexoContato">Sexo</label>
            <input type="text" name="sexoContato" value="<?= $dados["sexo_Contato"] ?>">
        </div>

        <div>
            <label for="dataNascContato">Data de Nascimento </label>
            <input type="date" name="dataNascContato" value="<?= $dados["dataNasc_Contato"] ?>">
        </div>

        <div>
            <input type="submit" value="Atualizar" name="btnAtualizar">
        </div>
    </form>
</div>