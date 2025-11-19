<h1>Listar Venda</h1>

<?php
$sql = "SELECT 
            vd.id_venda,
            vd.data_venda,
            vd.valor_venda,
            cli.nome_cliente,
            mo.nome_modelo,
            fun.nome_funcionario
        FROM venda AS vd
        INNER JOIN cliente AS cli
            ON cli.id_cliente = vd.cliente_id_cliente
        INNER JOIN modelo AS mo
            ON mo.id_modelo = vd.modelo_id_modelo
        INNER JOIN funcionario AS fun
            ON fun.id_funcionario = vd.funcionario_id_funcionario
        ORDER BY vd.id_venda";

$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-striped table-bordered'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Data</th>";
    print "<th>Valor</th>";
    print "<th>Cliente</th>";
    print "<th>Modelo</th>";
    print "<th>Funcionário</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {

        $data = date("d/m/Y", strtotime($row->data_venda));
        $valor = number_format($row->valor_venda, 2, ',', '.');

        print "<tr>";
        print "<td>{$row->id_venda}</td>";
        print "<td>{$data}</td>";
        print "<td>R$ {$valor}</td>";
        print "<td>{$row->nome_cliente}</td>";
        print "<td>{$row->nome_modelo}</td>";
        print "<td>{$row->nome_funcionario}</td>";

        print "<td>
                <button onclick=\"location.href='?page=editar-venda&id_venda=$row->id_venda';\" 
                        class='btn btn-success'>Editar</button>

                <button onclick=\"if(confirm('Tem certeza que quer excluir?')) {
                                    location.href='?page=salvar-venda&acao=excluir&id_venda=$row->id_venda';
                                 }\" 
                        class='btn btn-danger'>Excluir</button>
               </td>";

        print "</tr>";
    }

    print "</table>";
} else {
    print "<p>Não encontrou resultados</p>";
}
?>