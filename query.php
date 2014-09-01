<?php include("config.php"); ?>
<htm lang="pt-br">
    <html lang="pt-br">

    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
        </script>
    </head>
    <body>
       <h3>Sistema de Criação de Classes</h3>
       
       
       
       <form id="tab" name="tab" action="query.php" method="post">
                <div class="geral">
                <label>Nome da Conexão:<br/>
                <input type="text" value="" name="conname" id="conname" required="required" />
                 </label>
                 <br />
                <label>Nome da Query:<br/>
                	<input type="text" value="" name="nquery" id="nquery"  required="required" title="Nome da query"/>
                </label>
                <br />
                    <label>Tabela:<br/>
                        <select id="tabela" name="tabela">
                        <?php
                        $resultado = mysql_query("SHOW TABLES");
                        while($dados = mysql_fetch_array($resultado)){ ?>
                            <option id="<?php echo $dados[0]; ?>" value="<?php echo $dados[0]; ?>"><?php echo $dados[0]; ?></option>
                      <?php
                        }
                       ?>
                        </select>
                    </label>
                    <label>Codigo: <br />
<textarea rows="20" cols="70">
<?php 
    $post = $_POST['post'];
    if($post == 'ok'){
		$conname 		= $_POST['conname'];
        $nquery 		= $_POST['nquery'];
        $tabela 		= $_POST['tabela'];
        
    echo '    

mysql_select_db($database_'.$conname.', $'.$conname.');
$query_'.$nquery.' = "SELECT * FROM '.$tabela.'";
$'.$nquery.' = mysql_query($query_'.$nquery.', $'.$conname.') or die(mysql_error());
$row_'.$nquery.' = mysql_fetch_assoc($'.$nquery.');
$totalRows_'.$nquery.' = mysql_num_rows($'.$nquery.');



//função de repetição
<?php
do { 
?>


<?php
} while ($row_'.$nquery.' = mysql_fetch_assoc($qr_'.$nquery.'));
?>





//fecha conexão

<?php
mysql_free_result('.$nquery.');
?>

';
    } 
    ?>
</textarea>
                    
                    </label><br />
                    <input type="hidden" name="post" id="post" value="ok" />
                    <input type="submit" name="envia" id="envia" value="Gerar Query" />
                </div>
       </form>
    </body>
    </html>
    