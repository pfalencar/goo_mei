<?php
session_start();
include('verifica_login.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Go! MEI</title>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/formContact.css"/>
<link rel="stylesheet" type="text/css" href="styles/logo.css"/>
<link rel="stylesheet" type="text/css" href="styles/painel.css"/>
</head>
	<body>
		<div class="header">
	<div class="conexao">
	<a  href="logout.php"><b>Sair</b></a>
 	
 	</div>
<h2> Olá, 
        <a class="logo" href="painel.php"><?php echo $_SESSION['nome_usuario']; ?>!</a>
      </h2>

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
    <div class="container">
 <p><b>Organize e acompanhe suas vendas em um só lugar, Efetue agora uma nova venda de Serviço!</b></p>
   <a	href="CadVendaServico.php">
							<figure>
									<img	width="100"src="imagens/nova_venda.png" alt="venda"><br><br>
									<figcaption><b>Nova Venda de Serviço</b></figcaption>
							</figure>
					</a>
  </div>
  <div class="container">
 <p><b>Organize e acompanhe suas vendas em um só lugar, Efetue agora uma nova venda de Produto!</b></p>
   <a href="CadVendaProduto.php">
              <figure>
                  <img  width="100"src="imagens/nova_venda.png" alt="venda"><br><br>
                  <figcaption><b>Nova Venda de Produto</b></figcaption>
              </figure>
          </a>
  </div>
  <div class="container">
 
   <a	href="resumo.php">
   <p><b>Em Resumo Diário você encontra várias informações são muito importante para o planejamento estratégico da sua empresa.</b></p>
							<figure>
									<img	width="100"src="imagens/resumo_financeiro.png" alt="venda"><br><br>
									<figcaption><b>Resumo Diário</b></figcaption>
							</figure>
					</a>
					
  </div>

 

    
  </div>



	<!-- <div class="col-3 col-s-12"> 
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