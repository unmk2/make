<?php
$fp_list = fopen($dir."dell_$tabela".'.php', "a");

$escreve = fwrite($fp_list, "<?php"."\n");
$dell_id = '$id = $_GET[\'id\']';
$escreve = fwrite($fp_list, "$dell_id;"."\n");

$sql_dell = '$sql = "DELETE FROM `'.$tabela.'` WHERE `id` = \'$id\'"';

$escreve = fwrite($fp_list, "$sql_dell;"."\n");
$query_dell = 'mysql_query($sql)';
$escreve = fwrite($fp_list, "$query_dell;"."\n");
$escreve = fwrite($fp_list, "?>"."\n");


$redi = '<meta http-equiv="refresh" content="0;URL=?pg=modulos/'.$tabela.'/list_'.$tabela.'" />';
$escreve = fwrite($fp_list, "$redi"."\n");


fclose($fp_list);