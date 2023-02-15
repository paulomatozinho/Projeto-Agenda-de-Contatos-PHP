<link rel="stylesheet" href="css/style.css">

<header>
    Contatos
</header>

<div>
    <a href="index.php?menuop=cad-contato">Novo Contato</a>
</div>

<div>
    <form action="index.php?menuop=contatos" method="post">
        <input type="text" name="txt_pesquisa">
        <input type="submit" value="Pesquisar">
    </form>
</div>

<div class="tabela">
    <table class=" table table-dark table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Sexo</th>
                <th>Nascimento</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $quantidade = 5;

            $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;

            $inicio = ($quantidade * $pagina) - $quantidade;

            $txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";
            $sql = "SELECT 
        id_Contato,
        upper(nome_Contato) AS nome_Contato,
        lower(email_contato) AS email_Contato,
        telefone_Contato,
        upper(endereco_contato) AS endereco_Contato,
        CASE
            WHEN sexo_Contato= 'F' THEN 'FEMININO'
            WHEN sexo_Contato= 'M' THEN 'MASCULINO'
        ELSE
            'NÃO ESPECIFICADO'
        END AS sexo_Contato,
        date_format(dataNasc_Contato,'%d/%m/%Y') AS dataNasc_Contato
        FROM tb_contatos
        WHERE
        id_Contato='{$txt_pesquisa}' or
        nome_Contato LIKE '%{$txt_pesquisa}%'
        ORDER BY nome_Contato ASC
        LIMIT $inicio, $quantidade;";
            $rs = mysqli_query($conexao, $sql) or die("Erro na consulta" . mysqli_error($conexao));
            while ($dados = mysqli_fetch_assoc($rs)) {
            ?>
                <tr>
                    <td><?= $dados["id_Contato"] ?></td>
                    <td><?= $dados["nome_Contato"] ?></td>
                    <td><?= $dados["email_Contato"] ?></td>
                    <td><?= $dados["telefone_Contato"] ?></td>
                    <td><?= $dados["endereco_Contato"] ?></td>
                    <td><?= $dados["sexo_Contato"] ?></td>
                    <td><?= $dados["dataNasc_Contato"] ?></td>
                    <td><a href="index.php?menuop=editar-contato&idContato=<?= $dados["id_Contato"] ?>">Editar</a></td>
                    <td><a href="index.php?menuop=excluir-contato&idContato=<?= $dados["id_Contato"] ?>">Excluir</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<br>
<?php

$sqlTotal = "SELECT id_Contato FROM tb_contatos";
$qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
$numTotal = mysqli_num_rows($qrTotal);
$totalPagina = ceil($numTotal / $quantidade);
echo "Total de registros: $numTotal <br>";
echo '<a href="?menuop=contatos&pagina=1">Primeira Pagina</a>';

if ($pagina > 2) {
?>
    <a href="?menuop=contatos&pagina=<?php echo $pagina - 1 ?>">
        << </a>
        <?php
    }



    for ($i = 1; $i <= $totalPagina; $i++) {

        if ($i >= ($pagina - 5) && $i <= ($pagina)) {
            if ($i == $pagina) {
                echo $i;
            } else {
                echo "<a href=\"?menuop=contatos&pagina=$i\">$i</a>";
            }
        }
    }

    if ($pagina < ($totalPagina - 2)) {
        ?>
            <a href=" ?menuop=contatos&pagina=<?php echo $pagina + 1 ?>"> >> </a>

        <?php
    }

    echo "<a href=\"?menuop=contatos&pagina=$totalPagina\">Ultima Pagina</a>";
