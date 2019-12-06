<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/forms.css"/>
</head>
<body>

<div class="header">
	
  <a class="logo" href="index.php"><h1>Go! MEI</h1></a>
  
</div>

<div class="row">
  <div class="col-3 col-s-3 menu">
  
  </div>

  <div class="col-6 col-s-9">
   <form action="cadastrar.php" method="POST">
  <div class="container">
    <h3>Cadastro de Usuário</h3>
    <p>Por favor, preencha este formulário para criar uma conta</p>
    <hr>
    <?php
          if (isset($_SESSION['status_cadastro'])):
        ?>    
          <div>
           <strong><p style="color: lightgreen">Cadastro efetuado com sucesso!</p></strong><hr><p>Faça o login <a href="acessar.php">aqui</a></p>
          </div>      
        <?php
          endif;
          unset($_SESSION['status_cadastro']);
        ?>  
      
        <?php
          if (isset($_SESSION['usuario_existe'])):
        ?>      
          <div style="color: red">
            <strong><p> O usuário escolhido já existe! Informe outro e tente novamente.</p></strong>
          </div>
        <?php
          endif;
          unset($_SESSION['usuario_existe']);
        ?>

        <br>

    <label for="nome"><b>Nome</b></label>
    <input type="text" placeholder="Informe seu nome" name="nome" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Informe seu email" name="email" required>

    <label for="senha"><b>Senha</b></label>
    <input type="password" placeholder="Informe sua senha" name="senha" minlength="8" required>
    <hr>
    <p>Ao criar uma conta, você concorda com nossos <a href="#">Termos e Privacidade</a>.</p>

    <button type="submit" class="registerbtn">Cadastrar</button>
  </div>
  
  <div class="container signin">
    <p>já tem uma conta?<a href="acessar.php">Faça login</a>.</p>
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
  <p>Copyright © 2019 Lorem Ipsum</p>
</div>

</body>
</html>