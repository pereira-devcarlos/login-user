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
        <form method="post" action="index.php?action=register&from=list" class="register-form">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>

            <button type="submit" class="btn">Cadastrar</button>
        </form>
        <!-- Se vier cadastrar da página de lista de usuários -->
        <?php
        $from = isset($_GET['from']) ? $_GET['from'] : '';
        if ($from === 'list') {
        ?>
            <a href="index.php?action=list" class="back-link">Voltar à Lista de Usuários</a>
        <?php } else { ?>
            <a href="index.php?action=login" class="back-link">Voltar ao Login</a>
        <?php } ?>
    </div>
</body>

</html>