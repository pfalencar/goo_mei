<?php
session_start();
include_once("Conexao.php");

$idusuario = $_SESSION['id_usuario'];
$id_mei = filter_input(INPUT_POST, 'id_mei', FILTER_SANITIZE_STRING);
$idfunc = filter_input(INPUT_POST, 'funcionarios', FILTER_SANITIZE_STRING);

$result_funcionarios = "SELECT nome FROM funcionario WHERE id_funcionario ='$idfunc'";
$resultado_funcionarios = mysqli_query($conexao, $result_funcionarios);	
$row_funcionario = mysqli_fetch_assoc($resultado_funcionarios);
$nomefuncionario = $row_funcionario['nome'];

$iniciocontrato = filter_input(INPUT_POST, 'iniciocontrato', FILTER_SANITIZE_STRING);
$fimcontrato = filter_input(INPUT_POST, 'fimcontrato', FILTER_SANITIZE_STRING);
$horarioservico = filter_input(INPUT_POST, 'horarioservico', FILTER_SANITIZE_STRING);
$valorhora = filter_input(INPUT_POST, 'valorhora', FILTER_SANITIZE_STRING);
$dtpagamento = filter_input(INPUT_POST, 'dtpagamento', FILTER_SANITIZE_STRING);
$valorpagamento = filter_input(INPUT_POST, 'valorpagamento', FILTER_SANITIZE_STRING);

/*
echo "id usuario: $idusuario <br>";
echo "id mei: $id_mei <br>";
echo "id do funcionário: $idfunc <br>";
echo "nome do funcionario: $nomefuncionario <br>";
echo "iniciocontrato: $iniciocontrato <br>";
echo "fimcontrato: $fimcontrato <br>";
echo "horarioservico: $horarioservico <br>";
echo "valorhora: $valorhora <br>";
echo "dtpagamento: $dtpagamento <br>";
echo "valorpagamento: $valorpagamento <br>";
*/

$result_contrato = "INSERT INTO contrato (id_usuario, id_mei, id_funcionario, nomefuncionario, iniciocontrato, fimcontrato, horarioservico, valorhora, dtpagamento, valorpagamento,dt) VALUES ('$idusuario', '$id_mei', '$idfunc', '$nomefuncionario', '$iniciocontrato', '$fimcontrato','$horarioservico','$valorhora','$dtpagamento','$valorpagamento',NOW())";

$resultado_contrato = mysqli_query($conexao, $result_contrato);

if (mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Contrato cadastrado com sucesso</p>";
	header("Location:CadContrato.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Contrato não foi cadastrado com sucesso</p>";
	header("Location:CadContrato.php");
}


?>