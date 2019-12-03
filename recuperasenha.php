<?php
session_start();
include("conexao.php");
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
      <form action="proc_recupera_senha.php" method="POST">
  <div class="container">
    <h2> Informe seu email </h2>

    <hr>

    <?php
          if (isset($_SESSION['status_cadastro'])):
        ?>    
          <div>
           <strong><p style="color: red">O email informado não existe!<p></strong></p>
          </div>      
        <?php
          endif;
          unset($_SESSION['status_cadastro']);
        ?>  
      
        <?php
          if (isset($_SESSION['usuario_existe'])):
        ?>      
          <div style="color: green">
            <strong><p>A senha foi encaminhada para seu email.</p></strong>
          </div>
        <?php
          endif;
          unset($_SESSION['usuario_existe']);
        ?>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Informe o email" name="email" required>


    <button type="submit" class="registerbtn">Enviar</button>
  </div>
  
  <div class="container signin">
      <a href="cadastro.php"> Não é cadastrado? Cadastre-se! </a>
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