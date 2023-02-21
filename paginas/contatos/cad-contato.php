<header>
    <h3><i class="bi bi-person-square"></i> Cadastro de Contato</h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=inserir-contato" method="post" novalidate>
        <div class="mb-3">
            <label for="nomeContato" class="form-label">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control" name="nomeContato" required>
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
                <input type="email" class="form-control" name="emailContato" required>
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
                <input type="text" class="form-control" name="telefoneContato" required>
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
                <input type="text" class="form-control" name="enderecoContato" required>
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
                    <option selected value="">Selecionar</option>
                    <option value="M">Maculino</option>
                    <option value="F">Feminino</option>
                </select>
                <div class="valid-feedback">
                    Preenchimento Correto
                </div>
                <div class="invalid-feedback">
                    Preenchimento inválido
                </div>
            </div>

            <div class="mb-3 col-3">
                <label for="dataNascContato" class="form-label">Data de Nascimento </label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                    <input type="date" class="form-control" name="dataNascContato" required>
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
            <input type="submit" class="btn btn-success" value="Adicional" name="btnAdicionar">
        </div>
    </form>
</div>