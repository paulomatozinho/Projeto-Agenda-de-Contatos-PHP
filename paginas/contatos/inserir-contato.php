<header>
    <h3>Inserir Contato</h3>
</header>

<?php
$nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]);
$emailContato = mysqli_real_escape_string($conexao, $_POST["emailContato"]);
$telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]);
$enderecoContato = mysqli_real_escape_string($conexao, $_POST["enderecoContato"]);
$sexoContato = mysqli_real_escape_string($conexao, $_POST["sexoContato"]);
$dataNascContato = mysqli_real_escape_string($conexao, $_POST["dataNascContato"]);
$sql = "INSERT INTO tb_contatos(
    nome_Contato,
    email_Contato,
    telefone_Contato,
    endereco_Contato,
    sexo_Contato,
    dataNasc_Contato)
    VALUES(
        '{$nomeContato}',
        '{$emailContato}',
        '{$telefoneContato}',
        '{$enderecoContato}',
        '{$sexoContato}',
        '{$dataNascContato}'
    )
";

mysqli_query($conexao, $sql) or die("Erro na consulta." . mysqli_error($conexao));
echo "Inserido com sucesso";
?>