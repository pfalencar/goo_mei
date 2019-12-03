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
  <h1>Funcionário</h1>
  <p><b>O cadastro de Fornecedor traz eficiência na apuração dos dados, diminuindo erros e falhas no controle, e traz também agilidade, na hora da Compra. Efetue agora o cadastro de um novo Fornecedor! </b></p><br>


 <a href="CadFuncionario.php" class="button"><b>+ Adicionar</b></a>
 <hr>

  <?php
			if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  	}
	  	?>

    <p><b>Localize, Edite informações ou Exclua um Funcionário!</b></p>

    <form action="" method="POST">    

      <p><input type=text name=nomeFuncionario placeholder="Digite o nome do Funcionário" size="100" >
      <button type="submit" class="button" name="SendPesqUser" value="Pesquisar"><b>Pesquisar</b></button></p>  

    </form><br> 

    <?php
      $idusuario = $_SESSION['id_usuario'];
      //recebendo o botão
      $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

      //verificando se clicou no botao
      if ($SendPesqUser) {
        $nomefuncionario = filter_input(INPUT_POST,'nomeFuncionario', FILTER_SANITIZE_STRING);
        $result_funcionario = "SELECT * FROM funcionario WHERE id_usuario = '$idusuario' AND nome LIKE '%$nomefuncionario%'";
        $resultado_funcionario = mysqli_query($conexao, $result_funcionario);
    ?>

    <table id="customers">
      <tr>
          <th>Id Funcionário</th>
          <th>Nome</th>
          <th>CPF</th>
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
          <th>CTPS</th>
          <th>PIS/PASEP</th>
          <th>Número da Conta</th>
          <th>Tipo de Conta</th>
          <th>Nome do Banco</th>
          <th>Agência Bancária</th>           
        </tr>


          <?php

            while( $row_funcionario = mysqli_fetch_assoc($resultado_funcionario) ) {
    
            echo 
              "<tr>
                <td>" . $row_funcionario['id_funcionario'] . "</td>
                <td>" . $row_funcionario['nome'] . "</td>
                <td>" . $row_funcionario['cpf'] . "</td>
                <td>" . $row_funcionario['email'] . "</td>                
                <td>" . $row_funcionario['tel'] . "</td>
                <td>" . $row_funcionario['cel'] . "</td>
                <td>" . $row_funcionario['sexo'] . "</td>
                <td>" . $row_funcionario['rg'] . "</td>
                <td>" . $row_funcionario['nome_mae'] . "</td>
                <td>" . $row_funcionario['nome_pai'] . "</td>
                <td>" . $row_funcionario['cep'] . "</td>
                <td>" . $row_funcionario['logradouro'] . "</td>
                <td>" . $row_funcionario['numero'] . "</td>
                <td>" . $row_funcionario['bairro'] . "</td>
                <td>" . $row_funcionario['cidade'] . "</td>
                <td>" . $row_funcionario['uf'] . "</td>
                <td>" . $row_funcionario['ctps'] . "</td>
                <td>" . $row_funcionario['pispasep'] . "</td>
                <td>" . $row_funcionario['numeroconta'] . "</td>
                <td>" . $row_funcionario['tipoconta'] . "</td>
                <td>" . $row_funcionario['nomebanco'] . "</td>
                <td>" . $row_funcionario['agenciabancaria'] . "</td>
                <td><a href='edit_funcionario.php?id=" . $row_funcionario['id_funcionario'] . "'>Editar</a></td>
                <td><a href='proc_apagar_funcionario.php?id=" . $row_funcionario['id_funcionario'] . "'>Apagar</a></td>
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

