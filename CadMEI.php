<?php
session_start();
include_once("Conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Go! MEI - Cadastrar meu MEI</title>	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/forms.css"/>
</head>

<body>

<div class="header">
	<div class="conexao">
	<a  href="edit_mei.php"><b>Voltar</b></a>
 	
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
    <h1>Cadastrar meu MEI</h1>
    
   <?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		  	if (isset($_SESSION['status_cadastro'])):
		?>	  
		    <div>
				<p>Cadastro efetuado com sucesso!</p>
			</div>	

		<?php
		    endif;
				unset($_SESSION['status_cadastro']);
		?> 	
	  
		<?php
		  	if (isset($_SESSION['mei_existe'])):
		?>		  
				<div style="color: red">
				  <p> O MEI já foi cadastrado! Não é possível cadastrar mais de um MEI por usuário no sistema.</p>
				</div>
		  <?php
		    endif;
				unset($_SESSION['mei_existe']);
			 	
		?>

		<form action="proc_cad_mei.php" method="POST">

			<div class="container">
            <h2>Dados Gerais</h2>
	        <hr>
			
			  <label>Nome completo: </label>
			  <input type="text" name="nomecompleto" required><br><br>

			  <label>Email: </label>
			  <input type="email" name="email"><br><br>

			  <label>Razao Social: </label>
			  <input type="text" name="razaosocial" required><br><br>
			
			  <label>CNPJ: </label>
			  <input type="text" name="cnpj"><br><br>

			  <label>Ocupação Principal: </label>
			  <input type="text" name="ocupacaoprincipal" required><br><br>

			  <label>Ocupação Secundária: </label>
			  <input type="text" name="ocupacaosecundaria"><br><br>

			  <label>CPF: </label>
			  <input type="text" name="cpf"><br><br>

			  <label>Telefone: </label>
			  <input type="text" name="telefone"><br><br>

			  <label>Celular: </label>
			  <input type="text" name="celular" required><br><br>

			  <label>Sexo: </label>
			  <input type="radio" name="sexo" value="M"> Masculino
			  <input type="radio" name="sexo" value="F"> Feminino<br><br>

			  <label>RG: </label>
			  <input type="text" name="rg"><br><br>

			  <label>Nome da mãe: </label>
			  <input type="text" name="nome_mae" required><br><br>

			  <label>Nome do pai: </label>
			  <input type="text" name="nome_pai"><br><br>

			  <label>CEP: </label>
			  <input type=text name=cep required></p>

			  <label>Logradouro: </label>
			  <input type="text" name="logradouro"><br><br>

			  <label>Número: </label>
			  <input type="text" name="numero"><br><br>

			  <label>Bairro: </label>
			  <input type="text" name="bairro"><br><br>

			  <label>Cidade: </label>
			  <input type="text" name="cidade"><br><br>

			  <label>UF: </label>
			    <select name="uf">
					<option value="AC">AC</option>
					<option value="AL">AL</option>
					<option value="AP">AP</option>
					<option value="AM">AM</option>
					
					<option value="BA">BA</option>
					<option value="CE">CE</option>
					<option value="DF">DF</option>
					<option value="ES">ES</option>
					
					<option value="GO">GO</option>
					<option value="MA">MA</option>
					<option value="MT">MT</option>
					<option value="MS">MS</option>
					
					<option value="MG">MG</option>
					<option value="PA">PA</option>
					<option value="PB">PB</option>
					<option value="PR">PR</option>
					
					<option value="PE">PE</option>
					<option value="PI">PI</option>
					<option value="RJ">RJ</option>
					<option value="RN">RN</option>
					
					<option value="RS">RS</option>
					<option value="RO">RO</option>
					<option value="RR">RR</option>
					<option value="SC">SC</option>
					
					<option value="SP">SP</option>
					<option value="SE">SE</option>
					<option value="TO">TO</option>
					
				</select>
				<br><br>
				
			  <button type="submit" class="registerbtn"  value="Salvar">Cadastrar</button>
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
