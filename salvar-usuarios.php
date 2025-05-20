<?php
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$usuario = [
    'UsuarioID' => '',
    'Usuario' => '',
    'Nome' => '',
    'Email' => '',
    'Senha' => ''
];

if(!empty($_GET['id'])) {
    $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE UsuarioID = {$_GET['id']}");
    $usuario = mysqli_fetch_assoc($result) ?: $usuario;
}

?>

<main>
    <div id="usuarios" class="tela">
        <form class="crud-form" action="./action/usuarios.php?action=salvar" method="post">
            <h2><?php echo empty($usuario['UsuarioID']) ? 'Cadastro' : 'Edição' ?> de Usuários</h2>

            <input type="hidden" name="id" value="<?php echo $usuario['UsuarioID'] ?>">

            <input type="text" name="nome" placeholder="Nome completo"
                value="<?php echo $usuario['Nome'] ?>" required>

            <input type="text" name="usuario" placeholder="Nome de usuário"
                value="<?php echo $usuario['Usuario'] ?>" required>

            <input type="email" name="email" placeholder="Email"
                value="<?php echo $usuario['Email'] ?>" required>

            <input type="password" name="senha" placeholder="Senha" required>

            <button type="submit">Salvar</button>
        </form>
    </div>
</main>

<?php
include_once './include/footer.php';
?>