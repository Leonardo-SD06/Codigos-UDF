<?php

switch ($_REQUEST['acao']) {

    case 'cadastrar':

        $nome  = $_POST['nome_funcionario'];
        $cpf   = $_POST['cpf_funcionario'];
        $email = $_POST['email_funcionario'];
        $fone  = $_POST['fone_funcionario'];

        $sql = "INSERT INTO funcionario (
                    nome_funcionario,
                    cpf_funcionario,
                    email_funcionario,
                    fone_funcionario
                ) VALUES (
                    '{$nome}', '{$cpf}', '{$email}', '{$fone}'
                )";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=listar-funcionario';</script>";
        } else {
            print "<script>alert('Não cadastrou');</script>";
            print "<script>location.href='?page=listar-funcionario';</script>";
        }
    break;

    case 'editar':

        $nome  = $_POST['nome_funcionario'];
        $cpf   = $_POST['cpf_funcionario'];
        $email = $_POST['email_funcionario'];
        $fone  = $_POST['fone_funcionario'];

        $sql = "UPDATE funcionario SET
                    nome_funcionario  = '{$nome}',
                    cpf_funcionario   = '{$cpf}',
                    email_funcionario = '{$email}',
                    fone_funcionario  = '{$fone}'
                WHERE id_funcionario = ".$_REQUEST['id_funcionario'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=listar-funcionario';</script>";
        } else {
            print "<script>alert('Não editou');</script>";
            print "<script>location.href='?page=listar-funcionario';</script>";
        }
    break;

    case 'excluir':

        $sql = "DELETE FROM funcionario
                WHERE id_funcionario = ".$_REQUEST['id_funcionario'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=listar-funcionario';</script>";
        } else {
            print "<script>alert('Não excluiu');</script>";
            print "<script>location.href='?page=listar-funcionario';</script>";
        }
    break;
}
?>