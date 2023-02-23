<?php
$idContato = $_GET["idContato"];

$sql = "SELECT * FROM tb_contatos WHERE id_Contato = {$idContato}";

$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar registro." . mysqli_error($conexao));

$dados = mysqli_fetch_assoc($rs);

?>

<header>
    <h3>Editar contato</h3>
</header>

<div class="row">
    <div class="col-6">
        <form class="needs-validation" action="index.php?menuop=atualizar-contato" method="post" novalidate>
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
                    <input type="text" class="form-control" name="nomeContato" value="<?= $dados["nome_Contato"] ?>" required>
                    <div class="valid-feedback">
                        Preenchimento Correto
                    </div>
                    <div class="invalid-feedback">
                        O campo deve conter no máximo 255 caracteres
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="emailContato" class="form-label">E-mail</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input type="email" class="form-control" name="emailContato" value="<?= $dados["email_Contato"] ?>" required>
                    <div class="valid-feedback">
                        Preenchimento Correto
                    </div>
                    <div class="invalid-feedback">
                        Preenchimento inválido
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="telefoneContato" class="form-label">Telefone</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                    <input type="text" class="form-control" name="telefoneContato" value="<?= $dados["telefone_Contato"] ?>" required>
                    <div class="valid-feedback">
                        Preenchimento Correto
                    </div>
                    <div class="invalid-feedback">
                        Preenchimento inválido
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="enderecoContato" class="form-label">Endereço</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-mailbox"></i></span>
                    <input type="text" class="form-control" name="enderecoContato" value="<?= $dados["endereco_Contato"] ?>" required>
                    <div class="valid-feedback">
                        Preenchimento Correto
                    </div>
                    <div class="invalid-feedback">
                        Preenchimento inválido
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-3">
                    <label for="sexoContato" class="form-label">Sexo</label>
                    <select class="form-select" name="sexoContato" id="sexoContato" required>
                        <option <?php echo ($dados['sexo_Contato'] == '') ? 'selected' : '' ?> value="">Selecionar</option>
                        <option <?php echo ($dados['sexo_Contato'] == 'M') ? 'selected' : '' ?> value="M">Maculino</option>
                        <option <?php echo ($dados['sexo_Contato'] == 'F') ? 'selected' : '' ?> value="F">Feminino</option>
                        <option <?php echo ($dados['sexo_Contato'] == 'O') ? 'selected' : '' ?> value="O">Outro</option>
                    </select>
                    <div class="valid-feedback">
                        Preenchimento Correto
                    </div>
                    <div class="invalid-feedback">
                        Preenchimento inválido
                    </div>
                </div>

                <div class="mb-3 col-3">
                    <label for="dataNascContato" class="form-label">Data de Nasc.</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                        <input type="date" class="form-control" name="dataNascContato" id="dataNascContato" required>
                        <div class="valid-feedback">
                            Preenchimento Correto
                        </div>
                        <div class="invalid-feedback">
                            Preenchimento inválido
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <input type="submit" class="btn btn-success" value="Atualizar" name="btnAtualizar">
            </div>
        </form>
    </div>

    <div class="col-6">
        <?php
        if ($dados["foto_Contato"] == "" || !file_exists('./paginas/contatos/foto-contatos/' . $dados["foto_Contato"])) {
            $nomeFoto = "SemFoto.jpg";
        } else {
            $nomeFoto = $dados["foto_Contato"];
        }
        ?>
        <img src="./paginas/contatos/foto-contatos/<?= $nomeFoto ?>" alt="foto de uma pessoa">

    </div>
</div>