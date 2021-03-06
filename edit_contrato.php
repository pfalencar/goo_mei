<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_contrato = "SELECT * FROM contrato WHERE id_contrato = '$id'";
$resultado_contrato = mysqli_query($conexao, $result_contrato);
$row_contrato = mysqli_fetch_assoc($resultado_contrato);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Go! MEI - Editar Contrato</title>	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/forms.css"/>
</head>

<body>

<div class="header">
	<div class="conexao">
	<a  href="PesquisaContrato.php"><b>Voltar</b></a>
 	
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
    <h1>Editar Contrato : <?php echo $row_contrato['id_contrato']; ?></h1>
    <a href="PesquisaContrato.php"> Pesquisar Contratos </a>

    <?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>

		 <?php
      $idusuario = $_SESSION['id_usuario'];     
      $result_funcionario = "SELECT id_funcionario, nome, cpf FROM funcionario WHERE id_usuario ='$idusuario'";
      $resultado_funcionarios = mysqli_query($conexao, $result_funcionario);     
    ?>

		<form action="proc_edit_contrato.php" method="POST">

			<div class="container">
  
            <h2>Dados Gerais</h2>
           <hr>

           <input type="hidden" name="id" value="<?php echo $row_contrato['id_contrato']; ?>"></p>
        
            <label>Funcionário: </label>
          <select name=funcionarios>

        <?php
          while ($row_funcionario = mysqli_fetch_assoc($resultado_funcionarios)) {
            echo "
                 <option value= ". $row_funcionario['id_funcionario'] .">". $row_funcionario['nome'] ."</option>
            ";
           }
        ?>

          </select>
    
        <br><br>
        <p>Início do contrato: <input type=date name=iniciocontrato min="2000-01-01" max="2030-12-31" value="<?php echo $row_contrato['iniciocontrato']; ?>"></p>
        <p>Fim do  contrato: <input type=date name=fimcontrato min="2000-01-01" max="2030-12-31" value="<?php echo $row_contrato['fimcontrato']; ?>"></p>
        <p>Horário de serviço: <input type=text name=horarioservico value="<?php echo $row_contrato['horarioservico']; ?>"></p>
        <p>Valor/Hora: <input type=text name=valorhora value="<?php echo $row_contrato['valorhora']; ?>"></p>
        <p>Data de Pagamento: <input type=text name=dtpagamento value="<?php echo $row_contrato['dtpagamento']; ?>"></p>
        <p>Valor eo Pagamento: <input type=text name=valorpagamento value="<?php echo $row_contrato['valorpagamento']; ?>"></p>
        <br><br>
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