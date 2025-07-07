<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar-se</title>
    <link rel="stylesheet" href="css/register.css">
</head>

<body class="register-body">
    <div class="register-container">
        <h2>Cadastro de Usuário</h2>
        <form method="post" action="index.php?action=register" class="register-form">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>

            <label for="perfil">Perfil:</label>
            <select name="perfil" id="perfil">
                <option value="admin">Admin</option>
                <option value="gestor">Gestor</option>
                <option value="colaborador">Colaborador</option>
            </select>

            <button type="submit" class="btn">Cadastrar</button>
        </form>
        <a href="index.php?action=login" class="back-link">Voltar ao Login</a>
    </div>
</body>

</html>