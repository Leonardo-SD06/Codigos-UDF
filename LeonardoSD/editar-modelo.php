<h1>Editar Modelo</h1>

<?php
    $sql = "SELECT * FROM modelo WHERE id_modelo=" . $_REQUEST['id_modelo'];
    $res = $conn->query($sql);
    $row_1 = $res->fetch_object();
?>

<form action="?page=salvar-modelo" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_modelo" value="<?php print $row_1->id_modelo; ?>">

    <!-- MARCA -->
    <div class="mb-3">
        <label>Marca
            <select name="marca_id_marca" class="form-control">
                <option disabled>-= Escolha =-</option>

                <?php
                    $sql_m = "SELECT * FROM marca ORDER BY nome_marca";
                    $res_m = $conn->query($sql_m);

                    while ($marca = $res_m->fetch_object()) {
                        $selected = ($marca->id_marca == $row_1->marca_id_marca) ? "selected" : "";
                        print "<option value='{$marca->id_marca}' $selected>
                                {$marca->nome_marca}
                               </option>";
                    }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Nome
            <input type="text" name="nome_modelo" class="form-control"
                   value="<?php print $row_1->nome_modelo; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>Cor
            <input type="text" name="cor_modelo" class="form-control"
                   value="<?php print $row_1->cor_modelo; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>Ano
            <input type="number" name="ano_modelo" class="form-control"
                   value="<?php print $row_1->ano_modelo; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>Tipo
            <input type="text" name="tipo_modelo" class="form-control"
            	   value="<?php print $row_1->ano_modelo; ?>">
        </label>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>