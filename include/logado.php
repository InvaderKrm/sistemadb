<!--// Verificar se existe o session login 
# caso nao esteja preenchido, redireciona para o login-->

<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
   }
?>
