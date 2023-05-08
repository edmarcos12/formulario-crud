<html lang= "en">
    <head>
        <meta charset="UTF-8">
        <meta http-equive="X-UA-compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>Animes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"rel="stylesheet">
        <scrip src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <style>
        a{
            float: right;
        }
        .card{
            float: left;
            margin: 10px;
            width: 300px;
        }
        h2{
            text-align: center;
        }

        #carrinho-principal{
            position: fixed;
            right: 10px;
            bottom: 10px
        }

        .up,
        .down {
            cursor: pointer;
        }
        </style>
     <div class="containe mt -3">
        <h2 class="text-center">Imagem e ação</h2>
        <?php
        include("conectar.php");
        $sql = "select * from produto";
        $resultado = conectar($sql);
        $i = 0;
        while ($linha = $resultado->fetch_assoc()) {
            $nome = $linha["nome"];
            $valor = $linha["valor"];
            $imagem = $linha["imagem"];
            $id = ["id"];
            ?>
            <div class="card">
                <img class="card-img-top" src="<?php echo $imagem; ?>" alt="Card imagem" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $nome; ?></h4>
                    <p class="card-text">R$: <?php echo $valor; ?>
                    <a hret="#" class="btn btn-outline-info" onclick="addItem(<?php echo $i ?>)">🛒</a>
        </p>
        </div>
        </div>
        <?php $i++;
        }
        ?>
        </div>

        <a href="#" id="carrinho-principal" class="btn btn-primary btn-lg" onclik="carrinho()"
        data-bs-toggle="modal" data-bs-target="#mymodal">🛒</a>

<!--The Modal -->
<div class="modal" id="myModal">
    <h4 class="modal-dialog modal-1g">
        <div class="modal-content">

<!--modal Header -->
<div class="modal-header">
    <h4 class="modal-litle">Produtos para encomenda</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>

 <!--modal body -->   
 <div class="modal-body" id="modal-body">
    <table class="table">
        <thead>
            <tr>
                <th>Produto</th>
                <th class="col-1">Valor</th>
                <th class="col-1">Quantidade</th>
    </tr>
    </thead>
    <tbody id="tb-corpo">
    </tbody>
    </table>
    </div>

    <!--modal footer -->   
    <div class="modal-footer">
    <button type="button" class="btn btn-sucess" onclick="enviarEncomenda()">Enviar Encomenda</button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>  
    </div>
    </div>
    </div>
    </div>

    <script>
        1sCarrinho =[];
        valorEncomenda = 0;

        function addItem(i) {
          if (1sCarrinho[i] != true) {
            1sCarrinho[i] = true;
            document.getElementsByClassName("btn")[i].classList.remove("btn-outline-info");
            document.getElementsByClassName("btn")[i].classList.add("btn-outline-info");
          } else{
            1sCarrinho[i] = false;
            document.getElementsByClassName("btn")[i].classList.remove("btn-info");
            document.getElementsByClassName("btn")[i].classList.add("btn-outline-info");
          }

            }
     1sProduto = [];

     function carrinho() {
        valorEncomenda = 0;
        1sProduto = [];
        for (coast i in 1sCarrinho) {
            if (1sCarrinho[i]){
                p = {};
                console.log(i);
                p.id =i;
                p.nome = document.getElementsByClassName("card-title")[i].innerHTML; 
                p.valor = document.getElementsByClassName("card-text")[i].innerHTML;
                n = p.valor.indexOF("<");
                p.valor = p.valor.substring(3, n);
                p.valor = p.valor.replace(",", ".");
                p.quantidade =1;
                console.log(p);
                1sProduto.push(p); 
            }

        }
        tbCorpo = "";
        for(coast i in 1sProduto) {
            p = 1sProduto[i];
            p.valorUnitario = p.valor;
            tbCorpo +
            <tr>
            <tb>$(p.nome)</td>
            <td class "valor">$(p.valor)</td>
            <td>
            <span class="up" onclick="mudarQt($[i],1)">🔼</span>
            <span class="qt">i[p.quantidade]</span>
            <span class="down"onclick="mudarQt($[i],-1)">🔽</span>
            </tr>
            </tr>
            -;
            valorEncomenda += Number(p.valor);
        }
        tbCorpo += <tr>
        <td>valor da Encomenda</td>
        <td colspan="2" id= "vlEncomenda">$(valorEncomenda)</td>
        </tr>;
         document.getElementById("tb-corpo").innerHTML = tbCorpo;  
     }
     function mudarQT(i, qt) {
        console.log(i);
        console.log(qt);
        p = 1sProduto[i];
        p.quantidade +=qt;
        if (p.quantidade <= 0) {
additem(p.id);
document.getElementsByTagName("tr")[i + 1].style.display = "nome";
p.valor = 0;
atualizaValorEncomenda();
return;
        }
        p.valor = p.quantidade * p.valorUnitario;
        document.getElementsByTagName("qt")[i].innerHTML = p.quantidade;
        document.getElementsByTagName("valor")[i].innerHTML = p.valor;
        atualizaValorEncomenda()
     }
function atualizaValorEncomenda() {
    valorEncomenda = 0;
    for (p of.1sProduto) {
        valorEncomenda += Number(p.valor);
    }
    document.getElementsByTagId("vlEncomenda")[i].innerHTML = valorEncomenda;
}

function enviarEncomenda() {
    fone = "5561993250992";
    if (valoEncomenda <= 0) {
        alert("A encomenda deve ter ao menos 1 produto.");
        return;
    }

    msg = "Gostaria de fazer a seguinte encomenda: \n";
    for (p of 1sProduto) {
        if (p.quantidade > 0) {
            msg += $(p.nome) Qt. $(p.quantidade) = $(p.valor) \n ;
        }
    }

msg += "Valor da Encomenda = ${valorEncomenda}";
msg = encodeURI(msg);
url = 'https://api.whatsapp.com/send?phone=${fone}&text=${msg}';

window.open(url, '_blank');
}
</script>
</body>
</html>
