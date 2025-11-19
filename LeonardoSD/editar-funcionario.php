<h1>Editar Funcionário</h1>

<?php
    $sql = "SELECT * FROM funcionario 
            WHERE id_funcionario=" . $_REQUEST['id_funcionario'];

    $res = $conn->query($sql);
    $row_1 = $res->fetch_object();
?>

<form action="?page=salvar-funcionario" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_funcionario" value="<?php print $row_1->id_funcionario; ?>">

    <div class="mb-3">
        <label>Nome
            <input type="text" name="nome_funcionario" class="form-control"
                   value="<?php print $row_1->nome_funcionario; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>CPF
            <input type="text" name="cpf_funcionario" class="form-control"
                   value="<?php print $row_1->cpf_funcionario; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>E-mail
            <input type="email" name="email_funcionario" class="form-control"
                   value="<?php print $row_1->email_funcionario; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>Telefone
            <input type="text" name="fone_funcionario" class="form-control"
                   value="<?php print $row_1->fone_funcionario; ?>">
        </label>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>