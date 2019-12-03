<?php
session_start();
include_once("Conexao.php");

$id_mei = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nomecompleto = filter_input(INPUT_POST, 'nomecompleto', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$razaosocial = filter_input(INPUT_POST, 'razaosocial', FILTER_SANITIZE_STRING);
$cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
$ocupacaoprincipal = filter_input(INPUT_POST, 'ocupacaoprincipal', FILTER_SANITIZE_STRING);
$ocupacaosecundaria = filter_input(INPUT_POST, 'ocupacaosecundaria', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$nome_mae = filter_input(INPUT_POST, 'nome_mae', FILTER_SANITIZE_STRING);
$nome_pai = filter_input(INPUT_POST, 'nome_pai', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);

/*
echo "id do mei: $id_mei <br>";
echo "nome: $nomecompleto <br>";
echo "email: $email <br>";
echo "razao social: $razaosocial <br>";
echo "ocupacaoprincipal: $ocupacaoprincipal <br>";
echo "ocupacaosecundaria: $ocupacaosecundaria <br>";
echo "cpf: $cpf <br>";
echo "telefone: $telefone <br>";
echo "celular: $celular <br>";
echo "sexo: $sexo <br>";
echo "rg: $rg <br>";
echo "nome_mae: $nome_mae <br>";
echo "nome_pai: $nome_pai <br>";
echo "cep: $cep <br>";
echo "logradouro: $logradouro <br>";
echo "numero: $numero <br>";
echo "bairro: $bairro <br>";
echo "cidade: $cidade <br>";
echo "uf: $uf <br>";
*/

$result_mei = "UPDATE mei SET nomecompleto='$nomecompleto', email='$email', razaosocial='$razaosocial', cnpj='$cnpj', ocupacaoprincipal='$ocupacaoprincipal', ocupacaosecundaria='$ocupacaosecundaria', cpf='$cpf', tel='$telefone', cel= '$celular', sexo='$sexo', rg='$rg', nome_mae='$nome_mae', nome_pai='$nome_pai', cep='$cep', logradouro='$logradouro', numero='$numero', bairro='$bairro', cidade='$cidade', uf='$uf' WHERE id_mei = '$id_mei'";

$resultado_mei = mysqli_query($conexao, $result_mei);

if (mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>MEI editado com sucesso</p>";
	header("Location:edit_mei.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>MEI não foi editado com sucesso</p>";
	header("Location:edit_mei.php?id=");
}


?>