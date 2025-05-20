<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = isset($_GET['action']) ? $_GET['action'] : '';

if (empty($acao)) {
    header("Location: ../lista-usuarios.php?error=missing_action");
    exit;
}

// validacao
switch ($acao) {
    case 'delete':
        if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $sql = "DELETE FROM usuarios WHERE UsuarioID = $id";
            
            if(mysqli_query($conn, $sql)) {
                header("Location: ../lista-usuarios.php?success=1");
                exit;
            } else {
                header("Location: ../lista-usuarios.php?error=1");
                exit;
            }
        }
        break;
    
    case 'salvar':
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $id = $_POST['id'] ?? null;
        
        if (!empty($id)) {
            $sql = "UPDATE usuarios SET
                    Nome = '$nome',
                    Usuario = '$usuario',
                    Email = '$email',
                    Senha = '$senha'
                    WHERE UsuarioID = $id";
        } else {
            $sql = "INSERT INTO usuarios (Nome, Usuario, Email, Senha) 
            VALUES ('$nome', '$usuario', '$email', '$senha')";
        }

        if(mysqli_query($conn, $sql)) {
            header("Location: ../lista-usuarios.php?success=1");
            exit;
        } else {
            header("Location: ../salvar-usuarios.php?error=1");
            exit;
        }

    default:
        header("Location: ../lista-usuarios.php");
        break;
}
?>