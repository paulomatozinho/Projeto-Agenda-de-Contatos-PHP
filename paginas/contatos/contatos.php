<link rel="stylesheet" href="css/style.css">

<header>
    <h3><i class="bi bi-person-square"></i> Contatos</h3>

</header>

<div>
    <a class="btn btn-info mb-2" href="index.php?menuop=cad-contato"><i class="bi bi-person-fill-add"></i> Novo Contato</a>
</div>

<div>
    <form action="index.php?menuop=contatos" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="txt_pesquisa">
            <button class="btn btn-outline-info btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
        </div>
    </form>
</div>

<div class="tabela">
    <table class=" table table-dark table-hover table-bordered table-sm">
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

            $quantidade = 10;

            $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 2;

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
                    <td class="text-nowrap"><?= $dados["nome_Contato"] ?></td>
                    <td><?= $dados["email_Contato"] ?></td>
                    <td><?= $dados["telefone_Contato"] ?></td>
                    <td><?= $dados["endereco_Contato"] ?></td>
                    <td><?= $dados["sexo_Contato"] ?></td>
                    <td><?= $dados["dataNasc_Contato"] ?></td>
                    <td class="text-center"><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-contato&idContato=<?= $dados["id_Contato"] ?>"><i class="bi bi-pencil-square"></i></a></td>
                    <td class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-contato&idContato=<?= $dados["id_Contato"] ?>"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<ul class="pagination justify-content-center">
    <?php

    $sqlTotal = "SELECT id_Contato FROM tb_contatos";
    $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
    $numTotal = mysqli_num_rows($qrTotal);
    $totalPagina = ceil($numTotal / $quantidade);

    echo "<li class= 'page-item'><span class='page-link'>Total de registros:  " . $numTotal . " </span></li>";

    echo '<li class= "page-item"><a class="page-link" href="?menuop=contatos&pagina=1">Primeira Pagina</a></li>';

    if ($pagina > 2) {
    ?>
        <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina - 1 ?>">
                <<< /a>
        </li>
    <?php
    }

    for ($i = 1; $i <= $totalPagina; $i++) {

        if ($i >= ($pagina - 5) && $i <= ($pagina)) {
            if ($i == $pagina) {

                echo "<li class= 'page-item active'><span class='page-link'>$i</span></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina=$i\">$i</a></li>";
            }
        }
    }

    if ($pagina < ($totalPagina - 2)) {
    ?>
        <li class="page-item"><a class="page-link" href=" ?menuop=contatos&pagina=<?php echo $pagina + 1 ?>">>></a></li>

    <?php
    }
    echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina=$totalPagina\">Ultima Pagina</a><li>";
    ?>

</ul>