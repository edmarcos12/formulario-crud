<?php
$path = "arquivo/";
$diretorio = dir($path);

echo "Lista de Arquivos do diretorio '<strong>".$path."</strong>':<br/>";
while($aqruivo = $diretorio -> read()){
    if($arquivo != "." && $arquivo != ".."){
        echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br>";
    }
}
$diretorio -> close();
?>