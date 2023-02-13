<header>
    <h3>Atualizar Contato</h3>
</header>

<?php
$idContato = mysqli_real_escape_string($conexao, $_POST["idContato"]);
$nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]);
$emailContato = mysqli_real_escape_string($conexao, $_POST["emailContato"]);
$telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]);
$enderecoContato = mysqli_real_escape_string($conexao, $_POST["enderecoContato"]);
$sexoContato = mysqli_real_escape_string($conexao, $_POST["sexoContato"]);
$dataNascContato = mysqli_real_escape_string($conexao, $_POST["dataNascContato"]);
$sql = "UPDATE tb_contatos SET
nome_Contato = '{$nomeContato}',
email_Contato = '{$emailContato}',
telefone_Contato = '{$telefoneContato}',
endereco_Contato = '{$enderecoContato}',
sexo_Contato = '{$sexoContato}',
dataNasc_Contato = '{$dataNascContato}'
WHERE id_Contato = '{$idContato}'
";

mysqli_query($conexao, $sql) or die("Erro na consulta." . mysqli_error($conexao));
echo "Atualizado com sucesso";
?>