
<!--/// verificar se existe o usuario e senha no banco
// CASO NAO EXISTA, redirecionar para o login
// CASO EXISTA, redirecionar para o index.php e
// criar a session login


 case
 logoff 
 ele "mata" encerra a session
// e redireciona para o login -->

<?php
session_start();
// acao login
$acao = isset($_GET['action']) ?? 'login';

switch ($acao) {
    case 'login':
        // Simulando uma verificação no banco de dados
        $usuarioCorreto =  mysqli_real_escape_string($conn, $_POST['usuario']);;
        $senhaCorreta =  mysqli_real_escape_string($conn, $_POST['senha']);;

        $usuario = $_POST['usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if ($usuario === $usuarioCorreto && $senha === $senhaCorreta) {
            $_SESSION['login'] = $usuario;
            header("Location: ../index.php");
            exit;
        } else {
            header("Location: ../login.php");
            exit;
        }
        break;
    case 'logoff':
    // destruir a sessão
        session_destroy();
        exit;
    default:
        header("Location: ../login.php");
        break;
}
?>
