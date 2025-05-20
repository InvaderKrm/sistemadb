
<!--/// verificar se existe o usuario e senha no banco
// CASO NAO EXISTA, redirecionar para o login
// CASO EXISTA, redirecionar para o index.php e
// criar a session login


 case
 logoff 
 ele "mata" encerra a session
// e redireciona para o login -->

<?php
include_once '../include/conexao.php';
// acao login
$acao = isset($_GET['action']) ?? 'login';

switch ($acao) {
    case 'login':
        $usuario = $_POST['usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';

        // Sanitizar o nome de usuário
        $usuario = mysqli_real_escape_string($conn, $usuario);

        $sql = "SELECT * FROM Usuarios WHERE Usuario = '$usuario'";
        $result = mysqli_query($conn, $sql);
        $usuarioBanco = mysqli_fetch_assoc($result);


        if ($usuarioBanco && password_verify($senha, $usuarioBanco['Senha'])) {
            $_SESSION['login'] = $usuarioBanco['Usuario'];
            header("Location: ../index.php");
            exit;
        } else {
            header("Location: ../login.php?erro=1");
            exit;
        }
        break;
    case 'logoff':
    // destruir a sessão
        session_destroy();
        header("Location: ../login.php");
        exit;
    default:
        header("Location: ../login.php");
        break;
}
?>
