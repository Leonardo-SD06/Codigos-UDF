<h1>Editar Venda</h1>

<?php
    $sql = "SELECT * FROM venda WHERE id_venda=" . $_REQUEST['id_venda'];
    $res = $conn->query($sql);
    $row_1 = $res->fetch_object();
?>

<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_venda" value="<?php print $row_1->id_venda; ?>">

    <!-- DATA -->
    <div class="mb-3">
        <label>Data
            <input type="date" name="data_venda" class="form-control"
                   value="<?php print $row_1->data_venda; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>Valor
            <input type="number" name="valor_venda" class="form-control" step="0.01"
                   value="<?php print $row_1->valor_venda; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>Cliente
            <select name="cliente_id_cliente" class="form-control">
                <option>-= Escolha =-</option>
                <?php
                    $sql = "SELECT * FROM cliente ORDER BY nome_cliente";
                    $res = $conn->query($sql);

                    while ($cliente = $res->fetch_object()) {
                        $selected = ($cliente->id_cliente == $row_1->cliente_id_cliente) ? "selected" : "";
                        print "<option value='{$cliente->id_cliente}' $selected>
                                {$cliente->nome_cliente}
                               </option>";
                    }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Modelo
            <select name="modelo_id_modelo" class="form-control">
                <option>-= Escolha =-</option>
                <?php
                    $sql = "SELECT * FROM modelo ORDER BY nome_modelo";
                    $res = $conn->query($sql);

                    while ($modelo = $res->fetch_object()) {
                        $selected = ($modelo->id_modelo == $row_1->modelo_id_modelo) ? "selected" : "";
                        print "<option value='{$modelo->id_modelo}' $selected>
                                {$modelo->nome_modelo}
                               </option>";
                    }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Funcionário
            <select name="funcionario_id_funcionario" class="form-control">
                <option>-= Escolha =-</option>
                <?php
                    $sql = "SELECT * FROM funcionario ORDER BY nome_funcionario";
                    $res = $conn->query($sql);

                    while ($func = $res->fetch_object()) {
                        $selected = ($func->id_funcionario == $row_1->funcionario_id_funcionario) ? "selected" : "";
                        print "<option value='{$func->id_funcionario}' $selected>
                                {$func->nome_funcionario}
                               </option>";
                    }
                ?>
            </select>
        </label>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>