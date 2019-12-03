<?php
session_start();
include('Conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Go! MEI - Cadastrar Compra</title>	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/forms.css"/>
</head>

<body>

<div class="header">
	<div class="conexao">
	<a  href="PesquisaCompra.php"><b>Voltar</b></a>
 	
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
    <h2>Cadastrar Aquisição</h2>
    <a href="PesquisaCompra.php"> Pesquisar Compras </a>
    <?php
      if( isset($_SESSION['msg']) ) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
    ?>

    <?php
      $idusuario = $_SESSION['id_usuario'];     
      $result_fornecedores = "SELECT id_fornecedor, nome_razaosocial, cpf_cnpj FROM fornecedor WHERE id_usuario ='$idusuario'";
      $resultado_fornecedores = mysqli_query($conexao, $result_fornecedores);     
    ?>

    <form action="proc_cad_compra.php" method="POST">
      <div class="container">
  
            <h2>Dados Gerais</h2>
          <hr>
        <input type="hidden" name=codcompra></p>
        <label>Fornecedor: </label>
        <select name=fornecedores>

        <?php
          while ($row_fornecedor = mysqli_fetch_assoc($resultado_fornecedores)) {
            echo "
                 <option value= ". $row_fornecedor['id_fornecedor'] .">". $row_fornecedor['nome_razaosocial'] ."</option>;
            ";
           }
        ?>

        </select>
        
        <?php         
          $result_mei = "SELECT * FROM mei WHERE id_usuario ='$idusuario'";
          $resultado_mei = mysqli_query($conexao, $result_mei);     
        ?>    
        
        
        <?php
          while ($row_mei = mysqli_fetch_assoc($resultado_mei)) {
            echo "
                   <input name='id_mei' type='hidden' value= ". $row_mei['id_mei'] . ">";
           }
        ?>
        
        <p>Descrição da Compra: <input type=text name=descricaocompra></p>
        <p>Valor da Compra: <input type=text name=valorcompra></p>
        
        <hr>
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