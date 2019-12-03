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
<
<body style="background-color: black">
	<div style='text-align: center; margin-top: 100px'><img border="0" height="227" src="http://1.bp.blogspot.com/-VHCN5ztcLbA/TaJKmMqMDTI/AAAAAAAAAnA/lAZnPq68Ctk/s400/manutencao.jpg" width="400" /></div>
<div style='display:none'>

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
  <h1>Vendas</h1>
  <p><b>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa. </b></p><br>
  <a href="CadVenda.php" class="button"><b>+ Adicionar</b></a>
  <hr>

  <?php
			if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  	}
	  	?>

 <p><b>Localize, Edite informações ou Exclua uma venda!</b></p>

 <form action="" method="POST"> 		

			<p><input type=text name=produto_servico placeholder="Digite o nome do produto/estoque ou serviço" size="100" >
			<button type="submit"class="button" name="SendPesqUser" value="Pesquisar"><b>Pesquisar</b></button></p>  

		</form>	<br>

		<?php
			//recebendo o botão
		  $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		  //verificando se clicou no botao
		  if ($SendPesqUser) {
		  	$produto_servico = filter_input(INPUT_POST,'produto_servico', FILTER_SANITIZE_STRING);
		  	$result_venda = "SELECT * FROM venda WHERE produto_servico LIKE '%$produto_servico%'";
		  	$resultado_venda = mysqli_query($conexao, $result_venda);
		?>

		
				
				<table id="customers">
					<tr>
						<th>Id Venda</th>
						<th>Produto/Serviço</th>
						<th>Data da Venda</th>
						<th>Quantidade</th>
						<th>Valor Total</th>
						<th>Valor Recebido</th>	
						<th>Troco</th>
						<th>Forma de Pagamento</th>					
					</tr>


		  		<?php

		  			while( $row_venda = mysqli_fetch_assoc($resultado_venda) ) {
		
						echo 

						//CONTINUAR A TROCAR POR VENDA A PARTIR DAQUI!
							"<tr>
								<td>" . $row_venda['id_fornecedor'] . "</td>
								<td>" . $row_venda['razaosocial'] . "</td>
								<td>" . $row_venda['inscricaoestadual'] . "</td>
								<td>" . $row_venda['inscricaomunicipal'] . "</td>

								<td>" . $row_venda['id_fornecedor'] . "</td>
								<td>" . $row_venda['razaosocial'] . "</td>
								<td>" . $row_venda['inscricaoestadual'] . "</td>
								<td>" . $row_venda['inscricaomunicipal'] . "</td>

								<td><a href='edit_fornecedor.php?id=" . $row_venda['id_fornecedor'] . "'>Editar</a></td>
								<td><a href='proc_apagar_fornecedor.php?id=" . $row_venda['id_fornecedor'] . "'>Apagar</a></td>
							</tr>";
		  			}
			}
					?>
		
			</table>
				<br><br>
				<br><br>

  <div class="footer">
  <p>Copyright © 2019 Go! MEI</p>
  </div>

</body>
</html>