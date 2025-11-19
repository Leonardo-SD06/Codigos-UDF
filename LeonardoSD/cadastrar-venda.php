<h1>Cadastrar Venda</h1>
<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Data
            <input type="date" name="data_venda" class="form-control">
        </label>
    </div>

    <div class="mb-3">
        <label>Valor
            <input type="number" name="valor_venda" class="form-control" step="0.01">
        </label>
    </div>

    <div class="mb-3">
        <label>Cliente
            <select name="cliente_id_cliente" class="form-control">
                <option>-= Escolha =-</option>
                <?php
                    $sql = "SELECT * FROM cliente";
                    $res = $conn->query($sql);
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_object()) {
                            print "<option value='{$row->id_cliente}'>
                                {$row->nome_cliente}</option>";
                        }
                    } else {
                        print "<option>Não há clientes cadastrados</option>";
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
                    $sql = "SELECT * FROM modelo";
                    $res = $conn->query($sql);
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_object()) {
                            print "<option value='{$row->id_modelo}'>
                                {$row->nome_modelo}</option>";
                        }
                    } else {
                        print "<option>Não há modelos cadastrados</option>";
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
                    $sql = "SELECT * FROM funcionario";
                    $res = $conn->query($sql);
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_object()) {
                            print "<option value='{$row->id_funcionario}'>
                                {$row->nome_funcionario}</option>";
                        }
                    } else {
                        print "<option>Não há funcionários cadastrados</option>";
                    }
                ?>
            </select>
        </label>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>