<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$idusuario = $_SESSION['id_usuario'];
$result_funcionario = "SELECT * FROM funcionario WHERE id_usuario = '$idusuario' AND id_funcionario = '$id'";
$resultado_funcionario = mysqli_query($conexao, $result_funcionario);
$row_funcionario = mysqli_fetch_assoc($resultado_funcionario);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Go! MEI</title>	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/forms.css"/>
</head>

<body>

<div class="header">
	<div class="conexao">
	<a  href="PesquisaFuncionario.php"><b>Voltar</b></a>
 	
 	</div>

   <a class="logo" href="painel.php"><h1>Go! MEI</h1></a>
  
</div>

<div class="row">
  <div class="col-3 col-s-3 menu">
    <ul>
	<li class="dropdown">
    <a href="" class="dropbtn">Catálogo</a>
    <div class="dropdown-content">
       <a href="PesquisaEstoque.php">Estoque</a>
	  <a href="PesquisaServico.php">Serviços</a>
	
      
    </div>
  </li>
  <li class="dropdown">
    <a href="" class="dropbtn">Vendas</a>
    <div class="dropdown-content">
      <a href="PesquisaVendaServico.php">Vendas de Serviços</a>
	 <a href="PesquisaVendaProduto.php">Vendas de Produtos</a>
      <a href="PesquisaCliente.php">Clientes</a>
      </div>
  </li>
   <li class="dropdown">
    <a href="" class="dropbtn">Compras</a>
    <div class="dropdown-content">
	  <a href="PesquisaCompra.php">Compras</a>
      <a href="PesquisaFornecedor.php">Fornecedores</a>
         
    </div>
  </li>

  <li class="dropdown">
    <a href="" class="dropbtn">Funcionários</a>
    <div class="dropdown-content">
	  <a href="PesquisaFuncionario.php">Funcionários</a>
      <a href="PesquisaContrato.php">Contratos</a>
         
    </div>
  </li>
  
  <!--<a href="#">Relatórios</a>-->
  
   <li class="dropdown">
    <a href="" class="dropbtn">Configurações</a>
    <div class="dropdown-content">
      <a href="edit_mei.php">Meus Dados</a>
	  <a href="usuario.php">Usuário</a>
      <a href="logout.php">Sair</a>
    </div>
  </li>
</ul>
  </div>

  <div class="col-6 col-s-9">
    <h1>Editar Funcionário : <?php echo $row_funcionario['id_funcionario']; ?></h1>
    <a href="PesquisaFuncionario.php"> Pesquisar Pesquisar </a>

    <?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>

		<form action="proc_edit_funcionario.php" method="POST">
				
			<div class="container">
            <h2>Dados Gerais</h2>
	        <hr>

			<input type="hidden" name="id" value="<?php echo $row_funcionario['id_funcionario']; ?>"></p>

			<p>Nome: 
				<input type=text name=nome value="<?php echo $row_funcionario['nome']; ?>"></p>

			<p>CPF: 
				<input type=text name=cpf value="<?php echo $row_funcionario['cpf']; ?>"></p>

			<p>E-mail: 
				<input type=text name=email value="<?php echo $row_funcionario['email']; ?>"></p>

			<p>Telefone: 
				<input type=text name=telefone value="<?php echo $row_funcionario['tel']; ?>"></p>

			<p>Celular: 
				<input type=text name=celular value="<?php echo $row_funcionario['cel']; ?>"></p>

			<p>Sexo: 
				<input type=text name=sexo value="<?php echo $row_funcionario['sexo']; ?>"></p>

			<p>RG: 
				<input type=text name=rg value="<?php echo $row_funcionario['rg']; ?>"></p>

			<p>Nome da mãe: 
				<input type=text name=nomemae value="<?php echo $row_funcionario['nome_mae']; ?>"></p>

			<p>Nome do pai: 
				<input type=text name=nomepai value="<?php echo $row_funcionario['nome_pai']; ?>"></p>

			<p>CEP: 
				<input type=text name=cep value="<?php echo $row_funcionario['cep']; ?>"></p>

			<p>Logradouro: 
				<input type=text name=logradouro value="<?php echo $row_funcionario['logradouro']; ?>"></p>

			<p>Número: 
				<input type=text name=numero value="<?php echo $row_funcionario['numero']; ?>"></p>

			<p>Bairro: 
				<input type=text name=bairro value="<?php echo $row_funcionario['bairro']; ?>"></p>

			<p>Cidade: 
				<input type=text name=cidade value="<?php echo $row_funcionario['cidade']; ?>"></p>

			<p>UF: 
				<input type=text name=uf value="<?php echo $row_funcionario['uf']; ?>"></p>

			<p>Carteira de Trabalho: 
				<input type=text name=ctps value="<?php echo $row_funcionario['ctps']; ?>"></p>

			<p>PIS/PASEP: 
				<input type=text name=pispasep value="<?php echo $row_funcionario['pispasep']; ?>"></p>

			<p>Número da conta: 
				<input type=text name=numeroconta value="<?php echo $row_funcionario['numeroconta']; ?>"></p>

			<p>Tipo da conta: 
				<input type=text name=tipoconta value="<?php echo $row_funcionario['tipoconta']; ?>"></p>

			<p>Nome do banco: 
				<input type=text name=nomebanco value="<?php echo $row_funcionario['nomebanco']; ?>"></p>

			<p>Agência bancária: 
				<input type=text name=agenciabancaria value="<?php echo $row_funcionario['agenciabancaria']; ?>"></p>

			<br><br>
			  
		    <button type="submit" class="registerbtn"  value="Salvar">Salvar</button>
			</div>
		</form>

		</div>


  <!--<div class="col-3 col-s-12">
    <div class="aside">
      <h2>What?</h2>
      <p>Chania is a city on the island of Crete.</p>
      <h2>Where?</h2>
      <p>Crete is a Greek island in the Mediterranean Sea.</p>
      <h2>How?</h2>
      <p>You can reach Chania airport from all over Europe.</p>
    </div>
  </div>-->

</div>

<div class="footer">
  <p>Copyright © 2019 Go! MEI</p>
</div>

</body>
</html>