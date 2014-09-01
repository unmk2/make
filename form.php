<html lang="pt-br">

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <link href="stylo.css" rel="stylesheet" type="text/css">

</head>
<?php
$files = $_POST['tipo'];
echo $files.'.php';
include("config.php");
$tab = $_POST['tabela'];

$query = mysql_query("SHOW COLUMNS FROM $tab ");
?>
<div class="botao"><a href="index.php">Volta</a></div>
<form method="post" action="procedural.php" name="form2" id="form2" enctype="multipart/form-data">
    <fieldset><legend>Campos da Tabela</legend>
        <?php
        while ($coluna = mysql_fetch_assoc($query)) {
            $coluna = $coluna["Field"];
            ?>
            <div class="direita">
                <label><?php echo "$coluna "; ?>:
                    <input type="checkbox" checked name="campo[]" value="<?php echo "$coluna"; ?>">
                </label>
            </div>

        <?php } ?>
        <br />
        <br />
        <br />
        <div class="direita">
            <label>Tabela Nome:
                <input type="text" name="tabela" id="tabela" value="<?php echo $_POST['tabela']; ?>">
            </label>

        </div>
    </fieldset>
    <br />
    <fieldset><legend>Formulario de inserção</legend>
        <?php
        $query2 = mysql_query("SHOW COLUMNS FROM $tab ");
        while ($coluna2 = mysql_fetch_assoc($query2)) {
            $coluna2 = $coluna2["Field"];

            ?>
            <input type="text" id="tab[]" name="tab[]" value="<?php echo "$coluna2"; ?>">
            <select id="tipo[]" name="tipo[]">
                <option>hidden</option>
                <option>text</option>
                <option>Tel</option>
                <option>password</option>
                <option>textarea</option>
                <option>select</option>
            </select>
            <br />
        <?php } ?>
            <label>Cor do Botão<br />
            <select name="botao" id="botao">
                    <option>blue</option>
                    <option>green</option>
                    <option>grey</option>
                    <option>black</option>
            </select>
            </label>
            <fieldset>
                <legend>Formulario a Ser Gerado</legend>
                
                <input type="checkbox" checked name="cad" value="1">Cadastro: <br/>
                <input type="checkbox" checked name="edit" value="1">Edita: <br/>
                <input type="checkbox" checked name="list" value="1">Listagem:<br/>
                <input type="checkbox" checked name="dell" value="1">Deleta:
                    
                
            </fieldset>
            
            
    </fieldset>
    <input type="hidden" name="valida" id="valida" value="ok">
    <input type="submit" name="envia" value="envia">
</form>

</html>