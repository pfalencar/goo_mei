<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">  
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
      <form action="login.php" method="POST">
  <div class="container">
    <h2> Entre </h2>

    <?php 
        if (isset($_SESSION['nao_autenticado'])):
      ?>
      <h4 style="color:red"><strong>E-mail ou senha inválidos!</strong></h4>
      <?php 
        endif;
        unset($_SESSION['nao_autenticado']);
      ?>
    
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Informe o email" name="email" required>

    <label for="psw"><b>Senha</b></label>
    <input type="password" placeholder="Informe a senha" name="senha" required>

    <hr>
    <p><a href="recuperasenha.php">Esqueceu a senha?</a></p>

    <button type="submit" class="registerbtn">Entrar</button>
  </div>
  
  <div class="container signin">
      <a href="cadastro.php"> Não é cadastrado? Cadastre-se! </a>
  </div>
</form>
  <br><br>
  <br><br>
  <br>

  
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