<?php 
  // include dos arquivox
  include_once './include/logado.php';
  include_once './include/conexao.php';
  include_once './include/header.php';

  $funcionario = [
    'FuncionarioID' => '',
    'Nome' => '',
    'DataNascimento' => '',
    'Email' => '',
    'Sexo' => '',
    'CPF' => '',
    'RG' => '',
    'Salario' => '',
    'CargoID' => '',
    'SetorID' => ''
  ];

  $cargos = mysqli_query($conn, "SELECT CargoID, Nome FROM cargos");
  $setores = mysqli_query($conn, "SELECT SetorID, Nome FROM setor");

  if(!empty($_GET['id'])) {
    $result = mysqli_query($conn, "SELECT * FROM funcionarios WHERE FuncionarioID = {$_GET['id']}");
    $funcionario = mysqli_fetch_assoc($result) ?: $funcionario;
  }

?>
  
  <main>

    <div id="funcionarios" class="tela">

        <form class="crud-form" action="./action/funcionarios.php?action=salvar" method="post">

          <h2><?php echo empty($funcionario['FuncionarioID']) ? 'Cadastro' : 'Edição' ?> de Funcionários</h2>

            <input type="hidden" name="id" value="<?php echo $funcionario['FuncionarioID'] ?>">

            <input type="text" name="nome" placeholder="Nome do Funcionário"
              value="<?php echo $funcionario['Nome'] ?>" required>

            <input type="date" name="nascimento" placeholder="Data de Nascimento"
              value="<?php echo $funcionario['DataNascimento'] ?>" required>

            <input type="email" name="email" placeholder="Email"
              value="<?php echo $funcionario['Email'] ?>" required>

            <input type="number" placeholder="Salário"
              value="<?php echo $funcionario['Salario'] ?>" required>

            <select name="sexo" required>
              <option value="">Sexo</option>
              <?php 
              $sexos = ['M' => 'Masculino', 'F' => 'Feminino'];
              foreach ($sexos as $key => $value){} ?>
                <option value="<?php echo $key ?>" <?php echo $funcionario['Sexo'] == $key ? 'selected' : '' ?>>
                  <?php echo $value ?>
                </option>

            </select>

            <input type="number" name="cpf" placeholder="CPF"
              value="<?php echo $funcionario['CPF'] ?>" maxlength="11" required>

            <input type="number" name="rg" placeholder="RG"
              value="<?php echo $funcionario['RG'] ?>" maxlength="9" required>

            <select name="cargo" required>
              <option value="">Cargo</option>
              <?php while ($cargo = mysqli_fetch_assoc($cargos)): ?>
                <option value="<?php echo $cargo['CargoID'] ?>" <?php echo $cargo['CargoID'] == $funcionario['CargoID'] ? 'selected' : '' ?>>
                  <?php echo $cargo['Nome'] ?>
                </option>
              <?php endwhile; ?>
            </select>

            <select name="setor" required>
              <option value="">Setor</option>
              <?php while ($setor = mysqli_fetch_assoc($setores)): ?>
                <option value="<?php echo $setor['SetorID'] ?>" <?php echo $setor['SetorID'] == $funcionario['SetorID'] ? 'selected' : '' ?>>
                  <?php echo $setor['Nome'] ?>
                </option>
              <?php endwhile; ?>
            </select>

            
            <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
