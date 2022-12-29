<?php
//Gerar senha
//echo password_hash("123456", PASSWORD_DEFAULT);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    

    <div class="container text-center">
      <!--Substituir o botão pelos dados do usuario-->
      <div id="dados-usuario">
          <button type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#loginModal">
          Acessar
          </button>
          </div>
    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="loginModalLabel">Área Restrita</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="login-usuario-form">
            <span id="msgAlertErroLogin"></span>
              <div class="mb-3">
                <label for="email" class="col-form-label">Usuario:</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Digite o Usuario">
              </div>
              <div class="mb-3">
                <label for="senha" class="col-form-label">Senha:</label>
                <input type="password" name="senha" class="form-control" id="senha" autocomplete="on" placeholder="Digite a senha">
              </div>
              <div class="mb-3">
                    <input type="submit" class="btn btn-outline-primary btn-md" id="login-usuario-btn" value="Acessar">
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js1/custom.js"></script>
    <script src="js1/tata.js"></script>
  </body>
</html>