<?php
$idContato = $_GET["idContato"];

$sql = "SELECT * FROM tb_contatos WHERE id_Contato = {$idContato}";

$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar registro." . mysqli_error($conexao));

$dados = mysqli_fetch_assoc($rs);

?>

<header>
    <h3>Editar contato</h3>
</header>

<div>
    <form action="index.php?menuop=atualizar-contato" method="post">
        <div class="mb-3 col-3">
            <label for="idContato" class="form-label">ID</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-file-lock-fill"></i></span>
                <input type="text" class="form-control" name="idContato" value="<?= $dados["id_Contato"] ?>" readonly>
            </div>
        </div>

        <div class="mb-3">
            <label for="nomeContato" class="form-label">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control" name="nomeContato" value="<?= $dados["nome_Contato"] ?>">
            </div>
        </div>

        <div class="mb-3">
            <label for="emailContato" class="form-label">E-mail</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input type="email" class="form-control" name="emailContato" value="<?= $dados["email_Contato"] ?>">
            </div>
        </div>

        <div class="mb-3">
            <label for="telefoneContato" class="form-label">Telefone</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                <input type="text" class="form-control" name="telefoneContato" value="<?= $dados["telefone_Contato"] ?>">
            </div>
        </div>

        <div class="mb-3">
            <label for="enderecoContato" class="form-label">Endereço</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-mailbox"></i></span>
                <input type="text" class="form-control" name="enderecoContato" value="<?= $dados["endereco_Contato"] ?>">
            </div>
        </div>


        <div class="row">
            <div class="mb-3 col-3">
                <label for="sexoContato" class="form-label">Sexo</label>
                <select class="form-select" name="sexoContato" id="sexoContato">
                    <option <?php echo ($dados['sexo_Contato'] == '') ? 'selected' : '' ?> value="">Selecionar</option>
                    <option <?php echo ($dados['sexo_Contato'] == 'M') ? 'selected' : '' ?> value="M">Maculino</option>
                    <option <?php echo ($dados['sexo_Contato'] == 'F') ? 'selected' : '' ?> value="F">Feminino</option>
                    <option <?php echo ($dados['sexo_Contato'] == 'O') ? 'selected' : '' ?> value="O">Outro</option>
                </select>
            </div>

            <div class="mb-3 col-3">
                <label for="dataNascContato" class="form-label">Data de Nascimento </label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                    <input type="date" class="form-control" name="dataNascContato" id="dataNascContato">
                </div>
            </div>
        </div>

        <div>
            <input type="submit" class="btn btn-success" value="Atualizar" name="btnAtualizar">
        </div>
    </form>
</div>