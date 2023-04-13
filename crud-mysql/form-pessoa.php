<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Form Pessoa</title>
        </head>
<boby>
<?php
include 'conectar.php';
include 'validar-cpf.php';
$msgcpf = $id = $nome = $email = $cpf = $sexo = "";
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if (array_key_exists('id',$_GET)){
        $id = $_GET['id'];
        $pessoa = buscar($id);
        $nome = $pessoa['nome'];
        $email = $pessoa['email'];
        $cpf = $pessoa['cpf'];
        $sexo = $pessoa['sexo'];
    }
    if (array_key_exists('apagar',$_GET)){
        $apagar = $_GET['apagar'];
        $msg = apagar($apagar);
        echo $msg;
    }
}
     
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $msg = "";
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $id = $_POST['id'];
        $sexo = $_POST['sexo'];  
        $escolaridade = $_POST['escolaridade'];
        $senha = $_POST['senha'];
        $cpf = str_replace(".","",$cpf);
        $cpf = str_replace("-","",$cpf);
        
        if(validarCpf($cpf)){
        if($id == ''){
        $msg = incluir($nome, $email, $cpf, $sexo, $escolaridade, $senha );
    } else {
        $msg = alterar($id, $nome, $email, $cpf, $sexo, $escolaridade, $senha );
    }
}else{
        $msgcpf = "cpf invalido!";
}
echo $msg;
}

?>
<form action="form-pessoa.php" method="post">
    <input type="hidden" name="id"  value="<?php echo $id; ?>">
    <h1>Formulário de Pessoa</h1>
    Nome: <br>
    <input type="text" name="nome" value="<?php echo $nome; ?>" required><br>
    email: <br>
    <input type="email" name="email" value="<?php echo $email; ?>" required><br>
    CPF:<?php echo $msgcpf; ?> <br>
    <input type="text" name="cpf" value="<?php echo $cpf; ?>" required><br>
    <br>
    sexo: <br>
    <input type="radio" name="sexo" value="m" required <?php if($sexo == "m") echo "checked"; ?>>masculino<br>
    <input type="radio" name="sexo" value="f" required <?php if($sexo == "f") echo "checked"; ?>>feminino<br>
     
    <br>
    <br>
    <label>Escolaridade</label>
    <br>
    <select id="escolaridade" name="escolaridade">
        <option value="Ensino Médio"> Ensino Médio</option>
        <option value="Superior Incompleto">Superior Incompleto</option>
        <option value="Superior completo">Superior completo</option>
    </select>
    <br>
    <br>
  <label for="senha">senha:</label>
  <input type="senha" id="senha" name="senha"><br><br>
  <label for="confirmar">confirma:</label>
  <input type="confirmar" id="confirmar" name="confirmar" minlength="8"><br><br>
  <br>
  <br>
    <input type="submit" value="Gravar">
    <a href="form-pessoa.php">
    <input type="button" value="Novo">
    </a>
</form>
<br>
<?php

//  onclick="window.location.replace('form-pessoa.php');"


?>
<br>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>cpf</th>
        <th>sexo</th>
        <th>escolaridade</th>
        <th>senha</th>
    </tr>
    <?php
    $dados = listar();
    while ($linha = $dados->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$linha['id']."</td>";
        echo "<td>".$linha['nome']."</td>";
        echo "<td>".$linha['email']."</td>";
        echo "<td>".$linha['cpf']."</td>";
        echo "<td>".$linha['sexo']."</td>";
        echo "<td>".$linha['escolaridade']."</td>";
        echo "<td>".$linha['senha']."</td>";
        echo "<td><a href='form-pessoa.php?id=".$linha['id']."'>Editar</a></td>";
        echo "<td><a href='form-pessoa.php?apagar=".$linha['id']."'>Apagar</a></td>";
        echo "</tr>";
    }
    ?>
<script>
        function apagar(id){
            return confirm("Deseja Apagar o registro ID("+id+")?");
        }
    </script>
</table>
</body>
</html>
