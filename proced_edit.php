<?php
$fp_edit = fopen($dir."edit_$tabela".'.php', "a");


$escreve = fwrite($fp_edit, "<?php"."\n");

$id_edit = '$id = $_GET[\'id\']';
$escreve = fwrite($fp_edit, "$id_edit;"."\n");


$edit_post = '$post = $_POST[\'post\']';
$escreve = fwrite($fp_edit, "$edit_post;"."\n");

$edit_if = 'if($post == \'ok\'){';
$escreve = fwrite($fp_edit, "$edit_if"."\n");

foreach($campo as $vals2):
    $escreve = fwrite($fp_edit,"$$vals2=\$_POST['$vals2']; \n");
    endforeach;

$edit_insert = '$sql = "UPDATE `'.$tabela.'` SET ';
$escreve = fwrite($fp_edit, "$edit_insert");

//$final2 =   implode(",",$campo);
//$escreve = fwrite($fp_edit,"$final2");

foreach($campo as $vals):
    $escreve = fwrite($fp_edit,"$vals='$$vals',");
    endforeach;

/*
$final3 = implode("=", $campo);buyercomments
$escreve = fwrite($fp_edit,"='$final3'");
*/
$edit_sql3 = 'WHERE id=\'$id\'";';
$escreve = fwrite($fp_edit,"$edit_sql3"."\n");

$escreve = fwrite($fp_edit, "\n");



$edit_sql4 = 'mysql_query($sql)';
$escreve = fwrite($fp_edit,"$edit_sql4;"."\n");
$escreve = fwrite($fp_edit,"?>"."\n");
$redi = '<meta http-equiv="refresh" content="0;URL=?pg=modulos/'.$tabela.'/list_'.$tabela.'" />';
$escreve = fwrite($fp_edit, "$redi"."\n");
$escreve = fwrite($fp_edit, "<?php"."\n");
$escreve = fwrite($fp_edit,"}"."\n");

/*

$sql = "UPDATE `cliente` SET `nome` = 'candando', `sobrenome` = 'cuma', `idade` = '22'
mysql_query($sql);
}
*/

$edit_sql = '$selec = mysql_query("SELECT * FROM '.$tabela.' WHERE id = \'$id\'")';

$escreve = fwrite($fp_edit, "$edit_sql;"."\n");

$edit_sql2 = '
$linha_qr = mysql_fetch_assoc($selec);';

$escreve = fwrite($fp_edit, "$edit_sql2"."\n");
$escreve = fwrite($fp_edit, "?>"."\n");

$formt = '
    <?php
$mdulo = "'.$tabela.'";
?>
 <div class="bloco form" style="display:block">
            <div class="titulo">Cadastro de Cliente:
            <a href="?pg=modulos/<?php echo $mdulo ?>/add_<?php echo $mdulo ?>" title="" class="btnt">Cadastrar Novo</a>
            <a href="?pg=modulos/<?php echo $mdulo ?>/list_<?php echo $mdulo ?>" title="" class="btnt" style="float:right">Voltar Listagem</a>
            </div>
            <br/>
            <br/>
            <br/>
            <br/>
<form method="post" action="" name="form1" id="form1" enctype="multipart/form-data">
';
$escreve = fwrite($fp_edit, "$formt");
$escreve = fwrite($fp_edit, "\n");
$input = '<input type="hidden" name="post" id="post" value="ok" />';
$escreve = fwrite($fp_edit, "$input"."\n");

foreach($vetores as $tab => $tipo):
    $campos = $tab;
    $valores = $tipo;
    if($valores == 'hidden'){
        echo 'Campo id escondido';
        $fomu = '<input type="'.$valores.'" name="'.$campos.'" id="'.$campos.'" value="<?php echo $linha_qr['.$campos.'] ;?>" />';
        $escreve = fwrite($fp_edit, "$fomu");
    }elseif($valores == 'text'){

        $fomu = '
            <label class="line">
			<span class="data">
			'.ucfirst($campos).':</span>
            <input type="'.$valores.'" name="'.$campos.'" id="'.$campos.'" value="<?php echo $linha_qr['.$campos.'] ;?>" />
            </label>
            ';
        $escreve = fwrite($fp_edit, "$fomu");
        echo '<br />';
        echo 'Campos de texto Gerado';
    }elseif($valores == 'textarea'){

        $tx_areal = '
           <label class="line">
			<span class="data">
			'.ucfirst($campos).':</span>
            <textarea name="'.$campos.'" id="'.$campos.'" rows="3" cols="8"><?php echo $linha_qr['.$campos.'] ;?></textarea>
            </label>
            ';
        $escreve = fwrite($fp_edit, "$tx_areal");
        $escreve = fwrite($fp_edit, "<br />");
        $escreve = fwrite($fp_edit, "<br />");
        echo '<br />';
        echo 'Campo de Area de texto gerado';
    }elseif($valores == 'select'){
         if($campos == 'uf'){
        $tx_select = '
            <label class="line">
			<span class="data">
			'.ucfirst($campos).':</span>
                <select class="ui selection dropdown" name="'.$campos.'" id="'.$campos.'" >
                    <option selected="selected" value="<?php echo $linha_qr['.$campos.'] ;?>"><?php echo $linha_qr['.$campos.'] ;?></option>
                        <?php $db->uf(); ?>
            </select>
            </label>
            ';
        $escreve = fwrite($fp_edit, "$tx_select");
        echo '<br />';
        echo '<br />';
        echo 'Campo Select gerado';
        
         }else{
             
             $tx_select = '
            <label class="line">
			<span class="data">
			'.ucfirst($campos).':</span>
                <select class="ui selection dropdown" name="'.$campos.'" id="'.$campos.'" >
                    <option selected="selected" value="<?php echo $linha_qr['.$campos.'] ;?>"><?php echo $linha_qr['.$campos.'] ;?></option>
                </select>
            </label>
            ';
        $escreve = fwrite($fp_edit, "$tx_select");
        echo '<br />';
        echo '<br />';
        echo 'Campo Select gerado'; 
         }
        
    }
    
    $escreve = fwrite($fp_edit, "\n");
endforeach;

$submit = '<input type="submit" class="btn btn-default" name="submit" id="submit" value="gravar" style="margin-top: 10px; margin-right: 1000px;">';
$escreve = fwrite($fp_edit, "$submit");
$escreve = fwrite($fp_edit, "
</form>
</div>
");

$escreve = fwrite($fp_edit, "<?php"."\n");
$escreve = fwrite($fp_edit, "?>"."\n");
fclose($fp_edit);