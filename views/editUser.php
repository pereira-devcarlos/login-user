<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="css/edit.css">
</head>

<body class="edit-body">
    <div class="edit-container">
        <h2>Editar Usuário</h2>
        <form method="post" action="index.php?action=edit&id=<?= $user['id'] ?>" class="edit-form">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= $user['nome'] ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= $user['email'] ?>" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" placeholder="Deixe em branco para não alterar">
            
            <?php if ($_SESSION['perfil'] !== 'gestor'): ?>
                <label for="perfil">Perfil:</label>
                <select name="perfil" id="perfil">
                    <option value="admin" <?= $user['perfil'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="gestor" <?= $user['perfil'] == 'gestor' ? 'selected' : '' ?>>Gestor</option>
                    <option value="colaborador" <?= $user['perfil'] == 'colaborador' ? 'selected' : '' ?>>Colaborador</option>
                </select>
            <?php else: ?>
                <div class="perfil-row">
                  <label for="perfil">Perfil:</label>
                  <input type="hidden" name="perfil" value="<?= htmlspecialchars($user['perfil']) ?>">
                  <span class="perfil-info"> <?= ucfirst($user['perfil']) ?> </span>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn">Salvar</button>
        </form>
        <a href="index.php?action=list" class="back-link">Voltar para Lista de Usuários</a>
    </div>
</body>

</html>