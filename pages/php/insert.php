<?php 
// Conexao com o banco
require_once('connection.php');

// Recebendo variaveis do form
$cliente = $_POST['cliente'];
$pacote = $_POST['pacote'];

// Realizando insercao 
$result_clientes = $conn->prepare("INSERT INTO servico (fk_Cliente, fk_Pacote, data_servico) VALUES ('".$cliente."', '".$pacote."', '".date('Y-m-d H:i:s')."')");
$result_clientes->execute();
?>