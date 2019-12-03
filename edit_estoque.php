<?php
session_start();
include_once("Conexao.php");

$id_estoque = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$idusuario = $_SESSION['id_usuario'];
$result_estoque = "SELECT * FROM estoque WHERE id_usuario = '$idusuario' AND id_estoque = '$id_estoque'";
$resultado_estoque = mysqli_query($conexao, $result_estoque);
$row_estoque = mysqli_fetch_assoc($resultado_estoque);

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Go! MEI - Editar Estoque</title>	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/forms.css"/>
</head>

<body>

<div class="header">
	<div class="conexao">
	<a  href="PesquisaEstoque.php"><b>Voltar</b></a>
 	
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
    <h1>Editar Estoque : <?php echo $row_estoque['id_estoque']; ?></h1>
    <a href="PesquisaEstoque.php"> Pesquisar Estoque </a>

    <?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>

		<form action="proc_edit_estoque.php" method="POST">
				
			<div class="container">
            <h2>Dados Gerais</h2>
	        <hr>

			<input type="hidden" name="id_estoque" value="<?php echo $row_estoque['id_estoque']; ?>"></p>

			<p>Descrição do Produto: 
				<input type=text name=descricaoestoque value="<?php echo $row_estoque['descricaoEstoque']; ?>"></p>

			<p>Preço: 
				<input type=text name=preco value="<?php echo $row_estoque['preco']; ?>"></p>

			<p>Quantidade: 
				<input type=text name=quantidade value="<?php echo $row_estoque['quantidade']; ?>"></p>

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


