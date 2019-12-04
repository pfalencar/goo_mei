<?php
session_start();
include('Conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>  
<title>Go! MEI - Cadastrar Compra</title>	
<style type="text/css">
      .carregando{
        color:#ff0000;
        display:none;
      }
    </style>
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
    <h2>Cadastrar Venda</h2>
    <a href="PesquisaVendaServico.php"> Pesquisar Vendas de Serviços </a>
    <?php
      if( isset($_SESSION['msg']) ) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
    ?>

    <?php

      $idusuario = $_SESSION['id_usuario'];    
     // $ver = 2; 
        
    ?>

    <form action="proc_cad_vendas_servico.php" method="POST">
      <div class="container">
  
        <label>Serviço:</label>
        <select name="id_categoria" id="id_categoria">
        <option value="">Escolha o Serviço</option>
        <?php
          $result_cat_post = "SELECT * FROM servico WHERE id_usuario = '$idusuario' ORDER BY descricaoservico";
          $resultado_cat_post = mysqli_query($conexao, $result_cat_post);
          while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
            echo '<option value="'.$row_cat_post['id_servico'].'">'.$row_cat_post['descricaoservico'].'</option>';
          }
        ?>
      </select><br><br>

          <label>Valor Unitário:</label>
      <span class="carregando">Aguarde, carregando...</span>
      <select name="id_sub_categoria2" id="id_sub_categoria">
        <option  value="">Escolha o valor</option>
      </select><br><br>
      
          <label for="quantidade"><b>Quantidade</b></label>
          <input type="text" id="qntd"  name="quantidade"  required/> 

          <hr>


            <label><b>Cliente</b></label>
        <select name="cliente" id="cliente" required="required">
        <option value="">Escolha o Cliente</option>
        <?php
          $result_cat_cliente = "SELECT * FROM cliente WHERE id_usuario ='$idusuario' ORDER BY nome";
          $resultado_cat_cliente = mysqli_query($conexao, $result_cat_cliente);
          while($row_cat_cliente = mysqli_fetch_assoc($resultado_cat_cliente) ) {
            echo '<option value="'.$row_cat_cliente['id_cliente'].'">'.$row_cat_cliente['nome'].'</option>';
          }
        ?>
      </select><br>

              
          <label for="finalizadora"><b>Finalizadora</b></label>
            <select name="pagamento" required="required">
              <option value="dinheiro"><b>Dinheiro</b></option>
              <option value="cartao"><b>Cartão</b></option>
            </select>

          <label for="valortotal"><b>Valor Total</b></label>          
          <input type="text" placeholder="" id="result" name="result" required></input>

        <hr>
        <input type="button" value="calcular total" onclick="calcular();"/>
       <button type="submit" name="SendPesqUser" class="registerbtn"  value="Salvar">Salvar</button>
       </div>
    </form>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("jquery", "1.4.2");
    </script>
    
    <script type="text/javascript">
    $(function(){
      $('#id_categoria').change(function(){
        if( $(this).val() ) {
          $('#id_sub_categoria').hide();
          $('.carregando').show();
          $.getJSON('sub_categorias_post.php?search=',{id_categoria: $(this).val(), ajax: 'true'}, function(j){
            var options = '<option value="">Escolha Subcategoria</option>'; 
            for (var i = 0; i < j.length; i++) {
              options += '<option value="' + j[i].id + '">' + j[i].nome_sub_categoria + '</option>';
            } 
            $('#id_sub_categoria').html(options).show();
            $('.carregando').hide();
          });
        } else {
          $('#id_sub_categoria').html('<option value="">– Escolha Subcategoria –</option>');
        }
      });
    });
    </script>

    <script type="text/javascript">
      function calcular(){
      var valor1 = parseFloat(document.getElementById('id_sub_categoria').value, 10);
      var valor2 = parseFloat(document.getElementById('qntd').value, 10);
      document.getElementById('result').value = valor1 * valor2;
      }
    </script>

    </div>

<!--<div class="col-3 col-s-12">
    <div class="container">
      <form action="proc_cad_vendas_servico.php" method="POST">
      <table id="customers">
        <tr>
            <th>Serviço</th>
            <th>Quantidade</th>
            <th>Valor</th>
          </tr>

          <?php

          /*

          //verificando se clicou no botao
        if ($SendPesqUser) {
    
            echo 
              "<tr>
                <td>" .$servico. "</td>
                <td>" . $qntd. "</td>
                <td>" . $vt . "</td>
              </tr>
              ";
            }
            else
            {
               echo 
              "<tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              ";

            }

            */
        
          ?>

      
    
      </table>
      
        <button type="submit" name="enviar" value="salvar">FINALIZAR</button>
      </form>
    </div>
  </div>-->

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