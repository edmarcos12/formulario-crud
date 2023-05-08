<div class="row justify-content-center">
    <div class="col-md-10 ">
        <br>
        <table class="table table-striped">
            <tr>
                <tr>Nome</tr>
                <tr class="col-sm-1">imagem</tr>
                <tr class="col-sm-1">valor</tr>
                <tr class="col-sm-1" colspan="2">Ações</tr>
</tr>

     <?php
     $sql = "select * from produto";
     $resultado = conectar($sql);
        while ($linha = $resultado->fetch_assic()) {
    $nome = $linha["nome"];
    $valor = $linha["valor"];
    $imagem = $linha["imagem"];
    $id = $linha["id"];
echo "
          <tr>
                <td>$nome</td>
                <td><a href='$imagem' target='_blank' >🖼</a></td>
                <td>$valor</td>
                <td><a href='admin.php?editar=$id'>✒</a></td>
                <td><a href='admin.php?apagar=$id'>🗑</a></td>
</tr>";
}
?>
</table>
</div>
</div>