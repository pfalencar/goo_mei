<?php
session_start();
include_once("Conexao.php");

$id_usuario = $_SESSION['id_usuario'];
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
echo "id: $id_usuario <br>";
echo "nome: $nomecompleto <br>";
echo "email: $email <br>";
echo "razaosocial: $razaosocial <br>";
echo "cnpj: $cnpj <br>";
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

$sql = "select count(*) as total from mei where id_usuario = '$id_usuario'";

$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1){
	$_SESSION['mei_existe'] = true;
	header('Location: CadMei.php');
	exit;	

} elseif ($row['total'] == 0) {

	$result_mei = "INSERT INTO mei (id_usuario, nomecompleto, email, razaosocial, cnpj, ocupacaoprincipal, ocupacaosecundaria, cpf, tel, cel, sexo, rg, nome_mae, nome_pai, cep, logradouro, numero, bairro, cidade, uf) VALUES ('$id_usuario', '$nomecompleto', '$email', '$razaosocial', '$cnpj', '$ocupacaoprincipal', '$ocupacaosecundaria', '$cpf', '$telefone', '$celular', '$sexo', '$rg', '$nome_mae', '$nome_pai', '$cep', '$logradouro', '$numero', '$bairro', '$cidade', '$uf')";

	$resultado_mei = mysqli_query($conexao, $result_mei);

	if (mysqli_affected_rows($conexao)){
		$_SESSION['msg'] = "<p style='color:green'>MEI cadastrado com sucesso!</p>";
		header("Location:CadMei.php");
	} else {
		$_SESSION['msg'] = "<p style='color:red'>MEI não foi cadastrado com sucesso.</p>";
		header("Location:CadMei.php?id=");
	}
} else {
	die();
}



?>