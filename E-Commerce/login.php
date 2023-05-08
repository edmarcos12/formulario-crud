<?php
include('validar-login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <title>dOCUMENT</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"rel="stylesheet">
</head>

<body>
     <div class="container">
          <div class="row justify-content-center">
               <div class="col-6">
                    <h2>login
                        <h5><?php echo $acesso; ?></h5>
                    </h2>
                    <form action="login.php" method="POST">
                          <div class="mb-3 mt-3">
                               <label for="email" class="form-label">Email:</label>
                               <input type="email" clasee="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="mb-3">
                         <label for="senha" class="form-label">Senha:</label>
                         <input type="password" class="form-control" id="senha" placeholder="Entre com a senha" name="senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a href="index.php">Acessar Loja</a>
    </form>
            </div>
            </div>
    </div>

    </body>

</html>