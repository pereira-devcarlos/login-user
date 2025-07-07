<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      .alert-custom {
        color: #fff;
        background: #dc3545;
        border-radius: 5px;
        padding: 10px 20px;
        margin-bottom: 20px;
        font-weight: bold;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        opacity: 0;
        animation: fadeIn 0.6s ease forwards;
      }
      @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="post">
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    <div class="form-floating">
      <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email </label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="senha" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Senha</label>
    </div>
    

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Relembrar Senha
      </label>
    </div>

  <?php if (isset($error)): ?>
    <div class="alert alert-custom" role="alert">
      <?= htmlspecialchars($error) ?>
    </div>
  <?php endif; ?>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
    <p>Não possui uma conta? <a href="index.php?action=register">Cadastra-se</a></p>
    <p class="mt-5 mb-3 text-muted">&copy; Carlos Pereira</p>
  </form>
</main>


    
  </body>
</html>
