<?php
// onde os  arquivos  serao salvos
$pasta = "arquivos/";
$arquivos = $pasta.basename($_FILES["fileToUpload"]["name"]);
// echo $arquivos;
$uploadOK = 1;
$tipoArquivo = strtolower(pathinfo($arquivo,PATHINFO_EXTENSION));
$msgUpload = "";

if(isset($_POST["Submit"])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false){
        //echo  "E uma imagem ".$arquivo;
    }else{
        $msgUpload .= "Nao e uma imagem<br>";
        $uploadOK = 0;
    }

    // teste se o arquivo ja existe na pasta 
    if(file_exists($arquivo)){
        $msgUpload .= "Arquivo ja existente tente renomear ou enviar outro arquivo<br>";
        $uploadOK = 0;  
    }

// verificar o tamanho do arquivo
if($_FILES["fileToUpload"]["size"] >= 500000){
    $msgUpload .= "Arquivo muito grande supera o tamanho de 500KB<br>";
    $uploadOK = 0;  
}

// Verificar o tipo de imagem permetido
if($tipoArquivo != "jpg" && $tipoArquivo != "jpeg" && $tipoArquivo != "png" && $tipoArquivo != "gif"){
    $msgUpload .= "Tipo de arquivo nao permitido!<br>";
    $uploadOK = 0;  
}

if($uploadOK == 0){
    $msgUpload .= "Desculpe,nao sera possivel fazer o upload.<br>";
}else{
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$arquivo)){
        // echo "OK ao fazer o upload.";
    }else{
        $msgUpload .= "Desculpe, erro inesperado ao fazer o upload.";
    }
}
$msg = $msgUpload;
}
?>