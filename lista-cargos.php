<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

// string do comando SQL
$sql = "SELECT * FROM cargos";
// executa o comando sql
$result = mysqli_query($conn, $sql);

?>
  <main>

    <div class="container">
        <h1>Lista de Cargos</h1>
        <a href="./salvar-cargos.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Teto Salárial</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['CargoID'] ?></td>
                    <td><?= $row['Nome'] ?></td>
                    <td><?= number_format($row['TetoSalarial'], 2, ',', '.') ?></td>
                    <td>
                        <a href="editar-cargo.php?id=<?= $row['CargoID'] ?>" class="btn btn-edit">Editar</a>
                        <a href="./action/cargos.php?action=delete&id=<?= $row['CargoID'] ?>" class="btn btn-delete">Excluir</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
      </div> 
  </main>
  
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>