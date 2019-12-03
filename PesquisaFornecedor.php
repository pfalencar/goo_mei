<?php
session_start();
include("Conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <title>Go! MEI - Pesquisar Fornecedores</title> 
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
  <h1>Fornecedores</h1>
  <p><b>O cadastro de Fornecedor traz eficiência na apuração dos dados, diminuindo erros e falhas no controle, e traz também agilidade, na hora da Compra. Efetue agora o cadastro de um novo Fornecedor! </b></p><br>

  <a href="CadFornecedor.php" class="button"><b>Adicionar</b></a>
  <hr>

 <?php
      if( isset($_SESSION['msg']) ) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        }
      ?>

      <p><b>Localize, Edite informações ou Exclua um Fornecedor!</b></p><br>

      <form action="" method="POST">    

      <p><input type=text name=nomeFornecedor placeholder="Digite o nome do Fornecedor" size="100" >
      <button type="submit" class="button" name="SendPesqUser" value="Pesquisar"><b>Pesquisar</b></button></p>  

      </form><br>

     <?php
      $idusuario = $_SESSION['id_usuario'];
      //recebendo o botão
      $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

      //verificando se clicou no botao
      if ($SendPesqUser) {
        $nomeFornecedor = filter_input(INPUT_POST,'nomeFornecedor', FILTER_SANITIZE_STRING);
        $result_fornecedor = "SELECT * FROM fornecedor WHERE id_usuario = '$idusuario' AND nome_razaosocial LIKE '%$nomeFornecedor%'";
        $resultado_fornecedor = mysqli_query($conexao, $result_fornecedor);
    ?>


    <table id="customers">
     <tr>
            <th>Id Fornecedor</th>
            <th>Nome/Razão Social</th>
            <th>CPF/CNPJ</th>
            <th>Inscrição Estadual</th>
            <th>Inscrição Municipal</th>
            <th>E-mail</th>
            <th>Telefone</th> 
            <th>Celular</th>  
            <th>Sexo</th>
            <th>RG</th>
            <th>Nome da mãe</th>
            <th>Nome do pai</th>
            <th>CEP</th>
            <th>Logradouro</th>
            <th>Número</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>UF</th>       
          </tr>


          <?php

            while( $row_fornecedor = mysqli_fetch_assoc($resultado_fornecedor) ) {
    
            echo 
              "<tr>
                <td>" . $row_fornecedor['id_fornecedor'] . "</td>
                <td>" . $row_fornecedor['nome_razaosocial'] . "</td>
                <td>" . $row_fornecedor['cpf_cnpj'] . "</td>
                <td>" . $row_fornecedor['inscricaoestadual'] . "</td>
                <td>" . $row_fornecedor['inscricaomunicipal'] . "</td>
                <td>" . $row_fornecedor['email'] . "</td>
                <td>" . $row_fornecedor['tel'] . "</td>
                <td>" . $row_fornecedor['cel'] . "</td>
                <td>" . $row_fornecedor['sexo'] . "</td>
                <td>" . $row_fornecedor['rg'] . "</td>
                <td>" . $row_fornecedor['nome_mae'] . "</td>
                <td>" . $row_fornecedor['nome_pai'] . "</td>
                <td>" . $row_fornecedor['cep'] . "</td>
                <td>" . $row_fornecedor['logradouro'] . "</td>
                <td>" . $row_fornecedor['numero'] . "</td>
                <td>" . $row_fornecedor['bairro'] . "</td>
                <td>" . $row_fornecedor['cidade'] . "</td>
                <td>" . $row_fornecedor['uf'] . "</td>
                <td><a href='edit_fornecedor.php?id=" . $row_fornecedor['id_fornecedor'] . "'>Editar</a></td>
                <td><a href='proc_apagar_fornecedor.php?id=" . $row_fornecedor['id_fornecedor'] . "'>Apagar</a></td>
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
