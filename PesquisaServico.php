<?php
session_start();
include("Conexao.php");
?>

<!DOCTYPE html>
<html>
<head>
<tile>Go! MEI - Pesquisa Serviços</tile>	
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/table.css"/>
<link rel="stylesheet" type="text/css" href="styles/search.css"/>
<link rel="stylesheet" type="text/css" href="styles/button.css"/>
</head>

<body>

<div class="header">
	<div class="conexao">
	<a  href="painel.php"><b>Voltar</b></a>
 	
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
  <h1>Serviços</h1>
 <p><b>O cadastro de serviço traz eficiência na apuração dos dados, diminuindo erros e falhas no controle, e traz também agilidade, na hora da Venda. Efetue agora o cadastro de um novo Serviço! </b></p><br>

 <a href="CadServico.php" class="button"><b>Adicionar</b></a>
 <hr>

 <?php
			if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  	}
	  	?>

	  	<p><b>Localize, Edite informações ou Exclua um serviço!</b></p>

	  	<form action="" method="POST"> 		

			<p><input type=text name=descricaoServico placeholder="Digite a descrição do Serviço" size="100" >
			<button type="submit" class="button" name="SendPesqUser" value="Pesquisar"><b>Pesquisar</b></button></p>  

		</form><br>

		<?php

		  $idusuario = $_SESSION['id_usuario'];
			//recebendo o botão
		  $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		  //verificando se clicou no botao
		  if ($SendPesqUser) {
		  	$descricaoServico = filter_input(INPUT_POST,'descricaoServico', FILTER_SANITIZE_STRING);
		  	$result_servico = "SELECT * FROM servico WHERE id_usuario = '$idusuario' AND descricaoservico LIKE '%$descricaoServico%'";
		  	$resultado_servico = mysqli_query($conexao, $result_servico);
?>

		<table id="customers">
		<tr>
						<th>Id Serviço</th>
						<th>Descrição do Serviço</th>
						<th>Preço do Serviço</th>
						<th>Quantidade de Serviço</th>
						<th></th>
						<th></th>					
					</tr>


		  		<?php

		  			while( $row_servico = mysqli_fetch_assoc($resultado_servico) ) {
		
						echo 
							"<tr>
								<td>" . $row_servico['id_servico'] . "</td>
								<td>" . $row_servico['descricaoservico'] . "</td>
								<td>" . $row_servico['precoservico'] . "</td>
								<td>" . $row_servico['quantidadeservico'] . "</td>		
								<td><a href='edit_servico.php?id=" . $row_servico['id_servico'] . "'>Editar</a></td>
								<td><a href='proc_apagar_servico.php?id=" . $row_servico['id_servico'] . "'>Apagar</a></td>
							</tr>";
		  			}
			}
					?>
		
			</table>
			<br><br>
			<br><br>	    
			<br><br>
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
  <p>Copyright © 2019 GO! MEI</p>
</div>

</body>
</html>	