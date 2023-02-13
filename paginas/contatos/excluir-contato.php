<header>
    <h3>Excluir Contato</h3>
</header>

<?php
$idContato = mysqli_real_escape_string($conexao, $_GET["idContato"]);
$sql = "DELETE FROM tb_contatos WHERE id_Contato= '{$idContato}'";

mysqli_query($conexao, $sql) or die("Erro na exclusão." . mysqli_error($conexao));
echo "Excluido com sucesso";
?>