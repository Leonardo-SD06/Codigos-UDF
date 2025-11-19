<?php

switch ($_REQUEST['acao']) {

    case 'cadastrar':

        $data        = $_POST['data_venda'];
        $valor       = $_POST['valor_venda'];
        $cliente     = $_POST['cliente_id_cliente'];
        $modelo      = $_POST['modelo_id_modelo'];
        $funcionario = $_POST['funcionario_id_funcionario'];

        $sql = "INSERT INTO venda (
                    data_venda, valor_venda, cliente_id_cliente, modelo_id_modelo, funcionario_id_funcionario
                )
                VALUES (
                    '{$data}', '{$valor}', '{$cliente}', '{$modelo}', '{$funcionario}'
                )";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        } else {
            print "<script>alert('Não cadastrou');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        }
    break;


    case 'editar':

        $data        = $_POST['data_venda'];
        $valor       = $_POST['valor_venda'];
        $cliente     = $_POST['cliente_id_cliente'];
        $modelo      = $_POST['modelo_id_modelo'];
        $funcionario = $_POST['funcionario_id_funcionario'];

        $sql = "UPDATE venda SET
                    data_venda = '{$data}',
                    valor_venda = '{$valor}',
                    cliente_id_cliente = '{$cliente}',
                    modelo_id_modelo = '{$modelo}',
                    funcionario_id_funcionario = '{$funcionario}'
                WHERE id_venda = ".$_REQUEST['id_venda'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        } else {
            print "<script>alert('Não editou');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        }
    break;


    case 'excluir':

        $sql = "DELETE FROM venda
                WHERE id_venda = ".$_REQUEST['id_venda'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        } else {
            print "<script>alert('Não excluiu');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        }
    break;
}
?>