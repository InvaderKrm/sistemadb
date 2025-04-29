<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];

// validação da ação
switch ($acao) {
    case 'excluir':
        exit ('DELETE FROM cargos WHERE CargoID = '.$_GET['id']);  
        break;
        
    case 'salvar':
        if (isset($id) && !empty($id)) {
            exit ('UPDATE cargos SET Nome = "'.$nome.'", TetoSalarial = '.$teto.' WHERE CargoID = '.$id);
        } else {
            exit ('INSERT INTO cargos (Nome, TetoSalarial) VALUES ("'.$nome.'", '.$teto.')');
        }
        break;
        
    default:
        # code...
        break;
}

?>  