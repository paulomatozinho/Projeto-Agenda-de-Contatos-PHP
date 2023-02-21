<header>
    <h3><i class="bi bi-person-square"></i> Cadastro de Contato</h3>
</header>

<div>
    <form action="index.php?menuop=inserir-contato" method="post">
        <div class="mb-3">
            <label for="nomeContato" class="form-label">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control" name="nomeContato">
            </div>

        </div>

        <div class="mb-3">
            <label for="emailContato" class="form-label">E-mail</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input type="email" class="form-control" name="emailContato">
            </div>
        </div>

        <div class="mb-3">
            <label for="telefoneContato" class="form-label">Telefone</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                <input type="text" class="form-control" name="telefoneContato" id="telefoneContato">
            </div>
        </div>

        <div class="mb-3">
            <label for="enderecoContato" class="form-label">Endereço</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-mailbox"></i></span>
                <input type="text" class="form-control" name="enderecoContato" id="enderecoContato">
            </div>

        </div>

        <div class="row">
            <div class="mb-3 col-3">
                <label for="sexoContato" class="form-label">Sexo</label>
                <select class="form-select" name="sexoContato" id="sexoContato">
                    <option selected>Selecionar</option>
                    <option value="M">Maculino</option>
                    <option value="F">Feminino</option>
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
            <input type="submit" class="btn btn-success" value="Adicional" name="btnAdicionar">
        </div>
    </form>
</div>