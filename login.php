<?php
include_once './include/conexao.php';
include_once './include/logado.php';
include_once './include/header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Empresarial</title>
  <link rel="stylesheet" href="./assets/style.css">
  <style>
    
  </style>
</head>
<body>
  <header>
    <h1>Sistema de Gestão de Empresa</h1>
  </header>

  
  <main>

    <div id="login" class="tela active">
      <form class="login-form" method="POST" action="action/login.php?action=login">
        <h2>Login</h2>
        <input type="text" name="usuario" placeholder="Usuário" required/>
        <input type="password" name="senha" placeholder="Senha" required/>
        <button type="submit">Login</button>
      </form>
    </div>

   
  </main>

  <script src="./assets/script.js"></script>
</body>
</html>
