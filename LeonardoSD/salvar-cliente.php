<?php

switch ($_REQUEST['acao']) {

    case 'cadastrar':

        $nome     = $_POST['nome_cliente'];
        $cpf      = $_POST['cpf_cliente'];
        $email    = $_POST['email_cliente'];
        $data     = $_POST['dt_nasc_cliente'];
        $fone     = $_POST['fone_cliente'];
        $endereco = $_POST['endereco_cliente'];

        $sql = "INSERT INTO cliente (
                    nome_cliente,
                    cpf_cliente,
                    email_cliente,
                    dt_nasc_cliente,
                    fone_cliente,
                    endereco_cliente
                ) VALUES (
                    '{$nome}', '{$cpf}', '{$email}', '{$data}', '{$fone}', '{$endereco}'
                )";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        } else {
            print "<script>alert('Não cadastrou');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        }
    break;


    case 'editar':

        $nome     = $_POST['nome_cliente'];
        $cpf      = $_POST['cpf_cliente'];
        $email    = $_POST['email_cliente'];
        $data     = $_POST['dt_nasc_cliente'];
        $fone     = $_POST['fone_cliente'];
        $endereco = $_POST['endereco_cliente'];

        $sql = "UPDATE cliente SET
                    nome_cliente      = '{$nome}',
                    cpf_cliente       = '{$cpf}',
                    email_cliente     = '{$email}',
                    dt_nasc_cliente   = '{$data}',
                    fone_cliente      = '{$fone}',
                    endereco_cliente  = '{$endereco}'
                WHERE id_cliente = ".$_REQUEST['id_cliente'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        } else {
            print "<script>alert('Não editou');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        }
    break;


    case 'excluir':

        try {
            $sql = "DELETE FROM cliente WHERE id_cliente=".$_REQUEST['id_cliente'];
            $res = $conn->query($sql);

            print "<script>alert('Excluído com sucesso!');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";

        } catch (mysqli_sql_exception $e) {

            print "<script>alert('Não é possível excluir: este cliente possui vendas cadastradas.');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
            break;
    }
}
?>