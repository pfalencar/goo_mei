<?php
session_start();
include("Conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
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
  <h1>Vendas de Produtos</h1>
  <p><b></b></p><br>
  <a href="CadVendaProduto.php" class="button"><b>Adicionar</b></a>
  <hr>

  <?php
			if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  	}
	  	?>

 <p><b>Localize, Edite informações ou Exclua uma venda!</b></p>

 <form action="" method="POST"> 		

			<p><input type=text name=venda_produto placeholder="Digite o serviço vendido" size="100" >
			<button type="submit"class="button" name="SendPesqUser" value="Pesquisar"><b>Pesquisar</b></button></p>  

		</form>	<br>

		<?php
			//recebendo o botão
		  $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		  //verificando se clicou no botao
		  if ($SendPesqUser) {
		  	$venda_produto = filter_input(INPUT_POST,'venda_produto', FILTER_SANITIZE_STRING);
		  	$result_produto = "SELECT * FROM vendaproduto WHERE descricaoestoque LIKE '%$venda_produto%'";
		  	$resultado_venda = mysqli_query($conexao, $result_produto);
		?>

		
				
				<table id="customers">
					<tr>
						<th>Id Venda</th>
						<th>Produto</th>
						<th>Data da Venda</th>
						<th>Quantidade</th>
						<th>Valor Total</th>
						<th>Forma de Pagamento</th>	
						<th>Status</th>
						<th></th>
									
					</tr>


		  		<?php

		  			while( $row_venda = mysqli_fetch_assoc($resultado_venda) ) {
		
						echo 

						//CONTINUAR A TROCAR POR VENDA A PARTIR DAQUI!
							"<tr>
								<td>" . $row_venda['id_venda_produto'] . "</td>
								<td>" . $row_venda['descricaoestoque'] . "</td>
								<td>" . $row_venda['dtvenda'] . "</td>
								<td>" . $row_venda['qtd'] . "</td>
								<td>" . $row_venda['valortotal'] . "</td>
								<td>" . $row_venda['formapgto'] . "</td>
								<td>" . $row_venda['situacao'] . "</td>

								<td><a href='proc_cancelar_venda_produto.php?id=" . $row_venda['id_venda_produto'] . "'>Cancelar</a></td>
							</tr>";
		  			}
			}
					?>
		
			</table>
				<br><br>
				<br><br>
				<br><br>
				<br><br>
				<br>
			

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