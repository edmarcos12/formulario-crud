<form action="criar-enquete.php" method="get">
    <label for="nome-enquete" class="form-label">qual e o nome da enquete?</label>
    <input type="text" class="form-control" id="nome-enquete" name="nome-enquete" value="Nova enquete">
    <label for="nome-enquete" class="form-label">quais sao as opcoes da enquete?</label>
    <?php
    $qtOpcoes = $_GET['qt-opcoes'];
    for ($i=0; $i < $qtOpcoes; $i++) {
        echo "<input type='text' class='form-control' name='opcao[]' value='Opção $i'><br>";
}
?>
<br>
<button type="submit" class="btn-primary">submit</button>
</form>