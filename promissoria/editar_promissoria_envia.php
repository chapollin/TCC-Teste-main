<?php
require_once("../valida_session/valida_session.php");
require_once ("../bd/bd_promissoria.php");

if (isset($_POST["cod"]) && isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["valor"]) && isset($_POST["data_vencimento"])) {
    $codigo = $_POST["cod"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $data_vencimento = $_POST["data_vencimento"];

    $data = date("Y-m-d");

    $dados = editarPromissoria($codigo, $nome, $descricao, $valor, $data_vencimento, $data);

    if ($dados == 1){
        $_SESSION['texto_sucesso'] = 'Os dados da promissória foram alterados no sistema.';
        header ("Location: promissoria.php");
    } else {
        $_SESSION['texto_erro'] = 'Os dados da promissória não foram alterados no sistema!';
        header ("Location: promissoria.php");
    }
} else {
    $_SESSION['texto_erro'] = 'Por favor, preencha todos os campos!';
    header ("Location: promissoria.php");
}

?>