<?php 
require_once("conecta_bd.php");

function listaPromissoria(){
    $conexao = conecta_bd();
    $query = $conexao->prepare("SELECT promissoria.cod, cliente.nome,promissoria.descricao,promissoria.valor,promissoria.data_vencimento FROM promissoria,cliente WHERE promissoria.cod_cliente = cliente.cod;");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
}
function buscaPromissoria($cod_promissoria){
    $conexao = conecta_bd();
    $query = $conexao->prepare("SELECT promissoria.cod, cliente.nome, promissoria.descricao, promissoria.valor, promissoria.data_vencimento FROM promissoria INNER JOIN cliente ON promissoria.cod_cliente = cliente.cod WHERE promissoria.cod = :cod");
    $query->bindParam(':cod', $cod_promissoria, PDO::PARAM_INT);
    $query->execute();
    $promissoria = $query->fetch(PDO::FETCH_ASSOC);
    return $promissoria;
}
function editarPromissoria($codigo, $nome, $descricao, $valor, $data_vencimento)
{
    $conexao = conecta_bd();
    $query = $conexao->prepare("UPDATE promissoria SET cod_cliente = :cod_cliente, descricao = :descricao, valor = :valor, data_vencimento = :data_vencimento WHERE cod = :cod");
    $query->bindParam(':cod', $codigo, PDO::PARAM_INT);
    $query->bindParam(':cod_cliente', $nome, PDO::PARAM_INT);
    $query->bindParam(':descricao', $descricao, PDO::PARAM_STR);
    $query->bindParam(':valor', $valor, PDO::PARAM_STR);
    $query->bindParam(':data_vencimento', $data_vencimento, PDO::PARAM_STR);
    $query->execute();
    return $query->rowCount();
}
function removerPromissora($codigo){
    $conexao = conecta_bd();
    $query = $conexao->prepare("DELETE FROM promissoria WHERE cod = :cod");
    $query->bindParam(':cod', $codigo, PDO::PARAM_INT);
    $query->execute();
    return $query->rowCount();
}
?>