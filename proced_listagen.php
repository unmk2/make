<?php
$fp_list = fopen($dir."list_$tabela".'.php', "a");

//SELEC NO BANCO DE DADOS
$escreve = fwrite($fp_list, "<?php"."\n");

$escreve = fwrite($fp_list, '
$pag = "$_GET[pag]";
if($pag >=  \'1\'){
    $pag = $pag;
}else{
    $pag = \'1\';
}
'."\n");

$escreve = fwrite($fp_list, '$maximo = \'10\';'."\n");
$escreve = fwrite($fp_list, '$inicio = ($pag * $maximo) - $maximo;'."\n");


$sq = '
mysql_select_db($database_config, $config);
$query_qr_'.$tabela.' = "SELECT * FROM '.$tabela.' LIMIT $inicio, $maximo";
$qr_'.$tabela.' = mysql_query($query_qr_'.$tabela.', $config) or die(mysql_error());
$row_qr_'.$tabela.' = mysql_fetch_assoc($qr_'.$tabela.');
$totaoRows_qr_'.$tabela.' = mysql_num_rows($qr_'.$tabela.');
';
$escreve = fwrite($fp_list, "$sq"."\n");
$escreve = fwrite($fp_list, "?>"."\n");
$escreve = fwrite($fp_list, ""."\n");



$t = '
<div id="painel">
<div class="bloco list" style="display:block">
<div class="titulo">Listagem de '.ucfirst($tabela).':
                <label>
                  <a href="?pg=modulos/'.$tabela.'/add_'.$tabela.'" title="" class="btnt">Cadastrar Novo</a>
                </label>
                    <form name="filtro" action="" method="post">
                    <label>
                        <select name="tipo" style="height:20px">
                            <option value="Id">Código</option>
                        </select>
                    </label>
                    <label>
                            <input type="text" name="search" class="radius" size="30" value="Titulo:" onclick="if(this.value==&#39;Titulo:&#39;)this.value=&#39;&#39;" onblur="if(this.value==&#39;&#39;)this.value=&#39;Titulo:&#39;">
                    </label>
                    <input type="submit" value="filtrar resultados" name="sendFiltro" class="btnt">
                </form>

</div><!-- /titulo -->
';
$escreve = fwrite($fp_list, "$t"."\n");

$inicio_tabela = '<table width="100%" border="0" cellpadding="0" class="tbdados" style="float:left;" cellspacing="0" >';
$escreve = fwrite($fp_list, "$inicio_tabela"."\n");
$escreve = fwrite($fp_list, "<tr class=\"ses\">"."\n");

foreach($vetores as $tab => $tipo):
     $ola = $tab;
$escreve = fwrite($fp_list, "<td nowrap=\"nowrap\">$ola</td>"."\n");
endforeach;



$escreve = fwrite($fp_list, "<td nowrap=\"nowrap\" colspan=\"2\">Ações</td>"."\n");





$escreve = fwrite($fp_list, "</tr>"."\n");

//INICIO DO LACO
$while = 'do { ';
$escreve = fwrite($fp_list, "<?php"."\n");
$escreve = fwrite($fp_list, "$while"."\n");
$escreve = fwrite($fp_list, "?>"."\n");
//INICIO DO CAMPO DA TABELA
$escreve = fwrite($fp_list, "<tr>"."\n");




//CAMPOS DA TABE VINDO DO BANCO DE DADOS
foreach($vetores as $tab => $tipo):
    $ola = $tab;
    $res = '$row_qr_'.$tabela.'[\''.$ola.'\']';

$escreve = fwrite($fp_list, "<td><?php echo $res; ?></td>"."\n");

endforeach;


//AÇÕES DA TABELA
$id = '$row_qr_'.$tabela.'[\'id\']';
$escreve = fwrite($fp_list, "<td width=\"1%\" align=\"right\"><div class=\"bnt\"><a href=\"?pg=modulos/$tabela/edit_$tabela&id=<?php echo $id; ?>\"><i class=\"glyphicon glyphicon-edit\"></i></a></div></td>"."\n");
$escreve = fwrite($fp_list, "<td width=\"2%\" align=\"right\"><div class=\"bnt\"><a href=\"?pg=modulos/$tabela/dell_$tabela&id=<?php echo $id; ?>\"><i class=\"glyphicon glyphicon-remove\" style=\"color:#F00;\"></i></a></div></td>"."\n");
$escreve = fwrite($fp_list, "</tr>"."\n");

//FIN DO LAÇO
$endforeach = '} while ($row_qr_'.$tabela.' = mysql_fetch_assoc($qr_'.$tabela.'));';
$escreve = fwrite($fp_list, "<?php"."\n");
$escreve = fwrite($fp_list, "$endforeach"."\n");
$escreve = fwrite($fp_list, "?>"."\n");


$escreve = fwrite($fp_list, "</table>"."\n");
$escreve = fwrite($fp_list, "</div>"."\n");
$escreve = fwrite($fp_list, "</div>"."\n");




$f = '
<ul class="pagination">
    <?php
    $sql_res = mysql_query("SELECT * FROM '.$tabela.'");
    $total = mysql_num_rows($sql_res);
    $paginas = ceil($total/$maximo);
    $links = \'5\';
    ?>
   <li><a href="?pg=modulos/'.$tabela.'/list_'.$tabela.'&pag=1">&laquo;</a>&nbsp;&nbsp;&nbsp;</li>
<?php
for ($i = $pag-$links; $i <= $pag-1; $i++){
    if($i >= 0){ ?>
   <li><a href="?pg=modulos/'.$tabela.'/list_'.$tabela.'&pag=<?php echo $i ?>"><?php echo $i ?></a>&nbsp;&nbsp;&nbsp;</li>
<?php
    }    
}
?>
    <li class="disabled"><a href="#"><?php echo $pag; ?> </a>&nbsp;&nbsp;&nbsp;</li>
<?php
for($i = $pag +1; $i <= $pag+$links; $i++){
    if($i > $paginas){
        
    }  else {
   ?>
   <li><a href="?pg=modulos/'.$tabela.'/list_'.$tabela.'&pag=<?php echo $i ?>"><?php echo $i ?></a>&nbsp;&nbsp;&nbsp;</li>
<?php
   }
}
 ?>
   <li><a href="?pg=modulos/'.$tabela.'/list_'.$tabela.'&pag=<?php echo $paginas ?>">&raquo;</a>&nbsp;&nbsp;&nbsp;</li>
<?php
?>
</div>


';
$escreve = fwrite($fp_list, "$f"."\n");


fclose($fp_list);