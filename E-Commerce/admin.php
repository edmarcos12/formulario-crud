<?php
include('validar-acesso.php');
include('conectar.php');
include('gravar-produto.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.bundle.min.js"></script>
</head>

<body>
<div class="container">
          <div class="row justify-content-center">
               <div class="col-md-6 ">
                <h2>Cadastrar produto</h5>
</h2>
<form action="admin.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="mb-3 mt-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome ?>">
</div>
<div class="mb-3 mt-3">
        <label for="valor" class="form-label">Valor:</label>
        <input type="number" class="form-control" id="valor" name="valor" step="any" value="<?php echo $valor ?>">
</div>        
        <div class="mb-3 mt-3">
        <label for="fileToUpload" class="form-label">Imagem:</label>
        <input type="file" class="form-control" id="fileToUpload" name="fileToUpload">
        <input type="<?php echo $mostrarFileAtual ?>" class="form-control"
        id="fileAtual" name="fileAtual" value="<?php echo $imagem ?>">
</div>
<button type="submit" class="btn btn-primary" name="submit">Enviar</button>
<a href="admin.php" class="btn btn-primary">Novo</a>
<a href="logout.php" class="btn btn-primary">Sair</a>
</form>
<?php
if ($msg !="") {
    ?>
    <br>
    <div class="alert alert-<?php echo $tpMsg; ?> alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong><?php echo $msg; ?></strong>
</div>
</div>
<?php } ?>
</div>
<?php
include('listar-produto.php');
?>
</div>
</body>
</html>


}