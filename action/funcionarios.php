<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = isset($_GET['action']) ? $_GET['action'] : '';

if (empty($acao)) {
    header("Location: ../lista-cargos.php?error=missing_action");
    exit;
}

// validacao
switch ($acao) {
    case 'delete':
        if(isset($_GET['id'])) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $sql = "DELETE FROM funcionarios WHERE FuncionarioID = $id";
            
            if(mysqli_query($conn, $sql)) {
                header("Location: ../lista-funcionarios.php?success=1");
                exit;
            } else {
                header("Location: ../lista-funcionarios.php?error=1");
                exit;
            }
        }
        break;
    case 'salvar':
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $cargo = mysqli_real_escape_string($conn, $_POST['cargo']);
        $setor = mysqli_real_escape_string($conn, $_POST['setor']);
        $id = $_POST['id'] ?? null;

            if (!empty($id)) {
                $sql = "UPDATE funcionarios SET Nome = '$nome', CargoID = $cargo, SetorID = $setor WHERE FuncionarioID = $id";
            } else {
                $sql = "INSERT INTO funcionarios (Nome, CargoID, SetorID) VALUES ('$nome', $cargo, $setor)";
            }
        
            if(mysqli_query($conn, $sql)) {
                header("Location: ../lista-funcionarios.php?success=1");
                exit;
            } else {
                header("Location: ../salvar-funcionarios.php?error=1");
                exit;
            }
            break;
    
    default:
    header("Location: ../lista-funcionarios.php");
        break;
}
?>