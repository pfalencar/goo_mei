<?php
session_start();
include("Conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Go! MEI - Pesquisa Estoque</title>	
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
  <h1>Estoque</h1>
 <p><b>O cadastro de produto traz eficiência na apuração dos dados, diminuindo erros e falhas no controle, e traz também agilidade, na hora da Venda. Efetue agora o cadastro de um novo Produto! </b></p><br>
 <a href="CadEstoque.php" class="button"><b>Adicionar</b></a>
 <hr>

 <?php
			if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  	}
	  	?>

 <p><b>Localize, Edite informações ou Exclua um produto!</b></p>

<form action="" method="POST"> 		
	
	<p><input type=text name=descricaoEstoque placeholder="Digite a descrição do Estoque" size="100" >
	<button type="submit"class="button" name="SendPesqUser" value="Pesquisar"><b>Pesquisar</b></button></p>  

</form><br>	

<?php
		  $idusuario = $_SESSION['id_usuario'];
			//recebendo o botão
		  $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		  //verificando se clicou no botao
		  if ($SendPesqUser) {
		  	$descricaoEstoque = filter_input(INPUT_POST,'descricaoEstoque', FILTER_SANITIZE_STRING);
		  	$result_estoque = "SELECT * FROM estoque WHERE id_usuario = '$idusuario' AND descricaoestoque LIKE '%$descricaoEstoque%'";
		  	$resultado_estoque = mysqli_query($conexao, $result_estoque);
		?>

<table id="customers">
					<tr>
						<th>Id Estoque</th>
						<th>Descrição</th>
						<th>Preço</th>
						<th>Quantidade</th>	
						<th></th>
						<th></th>				
					</tr>


		  		<?php

		  			while( $row_estoque = mysqli_fetch_assoc($resultado_estoque) ) {
		
						echo 
							"<tr>
								<td>" . $row_estoque['id_estoque'] . "</td>
								<td>" . $row_estoque['descricaoEstoque'] . "</td>
								<td>" . $row_estoque['preco'] . "</td>
								<td>" . $row_estoque['quantidade'] . "</td>		
								<td><a href='edit_estoque.php?id=" . $row_estoque['id_estoque'] . "'>Editar</a></td>
								<td><a href='proc_apagar_estoque.php?id=" . $row_estoque['id_estoque'] . "'>Apagar</a></td>
							</tr>";
		  			}
			}
					?>
		
			</table>
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
  <p>Copyright © 2019 Go! MEI</p>
</div>

</body>
</html>
