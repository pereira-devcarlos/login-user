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

        <?php  // Se vier cadastrar da página de lista de usuários
            $from = isset($_GET['from']) ? $_GET['from'] : '';
            if ($from === 'list') {
        ?>       
                <form method="post" action="index.php?action=register&from=list" class="register-form">
        <?php } 
        
        // Se vier cadastrar da página de login
        else { ?>
                <form method="post" action="index.php?action=register" class="register-form">
        <?php } ?>

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>

            <button type="submit" class="btn">Cadastrar</button>
        </form>

        <?php // Se vier cadastrar da página de lista de usuários
        $from = isset($_GET['from']) ? $_GET['from'] : '';
        if ($from === 'list') { ?>
            <a href="index.php?action=list" class="back-link">Voltar à Lista de Usuários</a>
        <?php } 
        
        // Se vier cadastrar da página de login
        else { ?>
            <a href="index.php?action=login" class="back-link">Voltar ao Login</a>
        <?php } ?>
    </div>
</body>

</html>