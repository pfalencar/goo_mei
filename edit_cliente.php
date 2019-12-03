<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$idusuario = $_SESSION['id_usuario'];
$result_cliente = "SELECT * FROM cliente WHERE id_usuario = '$idusuario' AND id_cliente = '$id'";
$resultado_cliente = mysqli_query($conexao, $result_cliente);
$row_cliente = mysqli_fetch_assoc($resultado_cliente);

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Go! MEI - Editar Cliente</title>	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/forms.css"/>
</head>

<body>

<div class="header">
	<div class="conexao">
	<a  href="PesquisaCliente.php"><b>Voltar</b></a>
 	
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
    <h1>Editar Cliente : <?php echo $row_cliente['id_cliente']; ?></h1>
    <a href="PesquisaCliente.php"> Pesquisar Cliente </a>

    <?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>

		<form action="proc_edit_cliente.php" method="POST">
				
			<div class="container">
            <h2>Dados Gerais</h2>
	        <hr>

			<input type="hidden" name="id" value="<?php echo $row_cliente['id_cliente']; ?>"></p>

			<p>Nome: 
				<input type=text name=nome value="<?php echo $row_cliente['nome']; ?>"></p>

			<p>CPF: 
				<input type=text name=cpf value="<?php echo $row_cliente['cpf']; ?>"></p>

			<p>E-mail: 
				<input type=email name=email value="<?php echo $row_cliente['email']; ?>"></p>

			<p>Telefone: 
				<input type=text name=telefone value="<?php echo $row_cliente['tel']; ?>"></p>

			<p>Celular: 
				<input type=text name=celular value="<?php echo $row_cliente['cel']; ?>"></p>

			<p>Sexo: 
				<input type=text name=sexo value="<?php echo $row_cliente['sexo']; ?>"></p>

			<p>RG: 
				<input type=text name=rg value="<?php echo $row_cliente['rg']; ?>"></p>

			<p>Nome da mãe: 
				<input type=text name=nomemae value="<?php echo $row_cliente['nome_mae']; ?>"></p>

			<p>Nome do pai: 
				<input type=text name=nomepai value="<?php echo $row_cliente['nome_pai']; ?>"></p>

			<p>CEP: 
				<input type=text name=cep value="<?php echo $row_cliente['cep']; ?>"></p>

			<p>Logradouro: 
				<input type=text name=logradouro value="<?php echo $row_cliente['logradouro']; ?>"></p>

			<p>Número: 
				<input type=text name=numero value="<?php echo $row_cliente['numero']; ?>"></p>

			<p>Bairro: 
				<input type=text name=bairro value="<?php echo $row_cliente['bairro']; ?>"></p>

			<p>Cidade: 
				<input type=text name=cidade value="<?php echo $row_cliente['cidade']; ?>"></p>

			<p>UF: 
				<input type=text name=uf value="<?php echo $row_cliente['uf']; ?>"></p>
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


