<?php
session_start(); // Inicia a sessão, caso não tenha sido iniciada

// Verifica se o array $_SESSION e a chave 'perfil' estão definidos
if (isset($_SESSION['perfil'])):
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Usuários</title>
        <link rel="stylesheet" type='text/css' media='screen' href="css/list.css"> <!-- Link para o arquivo CSS -->
    </head>

    <body class="<?= $_SESSION['perfil'] ?>"> <!-- Define a classe com base no perfil do usuário -->
        <div class="container">
            <h2>Lista de Usuários</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['nome'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['perfil'] ?></td>
                            <td>
                                <!-- Permitir que admin e gestor editem -->
                                <?php if ($_SESSION['perfil'] == 'admin' || $_SESSION['perfil'] == 'gestor'): ?>
                                    <a href="index.php?action=edit&id=<?= $user['id'] ?>" class="btn-edit">Editar</a>
                                <?php endif; ?>

                                <!-- Permitir que apenas admin exclua -->
                                <?php if ($_SESSION['perfil'] == 'admin'): ?>
                                    <a href="#" id="btnDeleteUser" class="btn-edit btn-delete" data-user-id="<?= $user['id'] ?>">Excluir</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

            <!-- Modal de confirmação -->
            <div id="modalConfirm" class="modal-confirm-bg" style="display:none;">
              <div class="modal-confirm-box">
                <h3>Confirmar exclusão</h3>
                <p>Tem certeza que deseja excluir este usuário?</p>
                <div class="modal-confirm-actions">
                  <button id="btnCancel" class="btn-edit" type="button">Cancelar</button>
                  <button id="btnConfirmDelete" class="btn-edit btn-delete" type="button">Excluir</button>
                </div>
              </div>
            </div>

            <a href="index.php?action=dashboard" class="btn">Voltar ao Dashboard</a>
        </div>

        <script>
          let userIdToDelete = null;
          const modal = document.getElementById('modalConfirm');
          const confirmBtn = document.getElementById('btnConfirmDelete');
          const cancelBtn = document.getElementById('btnCancel');

          document.querySelectorAll('#btnDeleteUser').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
              e.preventDefault();
              userIdToDelete = this.getAttribute('data-user-id');
              modal.classList.add('show');
              modal.style.display = 'flex';
            });
          });

          confirmBtn.addEventListener('click', function() {
            if (userIdToDelete) {
              window.location.href = "index.php?action=delete&id=" + userIdToDelete;
            }
          });

          cancelBtn.addEventListener('click', function() {
            modal.classList.remove('show');
            setTimeout(function(){ modal.style.display = 'none'; }, 350);
          });

          modal.addEventListener('click', function(e) {
            if (e.target === this) {
              this.classList.remove('show');
              setTimeout(function(){ modal.style.display = 'none'; }, 350);
            }
          });
        </script>
    </body>

    </html>

<?php else: ?>
    <!-- Se $_SESSION['perfil'] não estiver definido, exibe uma mensagem -->

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Erro de acesso</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <script src='main.js'></script>
        <style>
            .containerErro {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                height: 100%;
            }
            .erro {
                display: flex;
                background-color: rgba(21, 81, 107, 0.63);
                display: flex;
                /*Comportamento do elemento na página*/
                font-family: verdana;
            }
            p{
                text-align: center;
                font-size: 30px;
                color: white;
            }
        </style>
    </head>

    <body class="erro">
        <main class="containerErro">
            <p>Erro: Você não tem permissão para visualizar esta página.</p><br><br>
            <a href="index.php?action=login" class="back-link">Voltar ao Login</a>
        </main>
    </body>

    </html>

<?php endif; ?>