<?php
$fp = fopen($dir."add_$tabela".'.php', "a");

$escreve = fwrite($fp, "<?php");
$escreve = fwrite($fp, "\n");

$escreve = fwrite($fp, '$post = $_POST[post];');
$escreve = fwrite($fp, "\n");
$escreve = fwrite($fp, 'if($post == ok){');
$escreve = fwrite($fp, "\n");

foreach($campo as $valor):
    $valores = '$'.$valor.' = $_POST['.$valor.'];'."\n";
    $escreve = fwrite($fp, "$valores");
endforeach;
$escreve = fwrite($fp, "\n");

$sql = '$sql';
$valor =  "$sql = \"INSERT INTO `$tabela` (";
$escreve = fwrite($fp, "$valor");
$final2 =   implode(",",$campo);
$escreve = fwrite($fp,"$final2");
$escreve = fwrite($fp,")");
$escreve = fwrite($fp,"VALUES (");
$final = "'".implode("','$",$campo)."'";
$escreve = fwrite($fp, "$final");

$escreve = fwrite($fp, ")");
$escreve = fwrite($fp, "\"");
$escreve = fwrite($fp, ";");
$escreve = fwrite($fp, "\n");
$escreve = fwrite($fp, "mysql_query($sql);");
$escreve = fwrite($fp, "\n");
$escreve = fwrite($fp, "echo 'Gravado com sucesso';");
$escreve = fwrite($fp, "\n");
$escreve = fwrite($fp, "?>");
$escreve = fwrite($fp, "\n");
$redi = '<meta http-equiv="refresh" content="0;URL=?pg=modulos/'.$tabela.'/list_'.$tabela.'" />';
$escreve = fwrite($fp, "$redi"."\n");
$escreve = fwrite($fp, "<?php");
$escreve = fwrite($fp, "\n");
$escreve = fwrite($fp, "}");
$escreve = fwrite($fp, "\n");
$escreve = fwrite($fp, "?>");
$escreve = fwrite($fp, "\n");