<?php
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
$escreve = fwrite($fp, "$formt");
$escreve = fwrite($fp, "\n");
$input = '<input type="hidden" name="post" id="post" value="ok" />';
$escreve = fwrite($fp, "$input"."\n");

foreach($vetores as $tab => $tipo):
    $campos = $tab;
    $valores = $tipo;
    if($valores == 'hidden'){
        echo 'Campo id escondido';
        $fomu = '<input type="'.$valores.'" name="'.$campos.'" id="'.$campos.'" value="" />';
        $escreve = fwrite($fp, "$fomu");
    }elseif($valores == 'text'){
        $escreve = fwrite($fp, "$div");
        $fomu = '
            <label class="line">
			<span class="data">
			'.ucfirst($campos).':</span>
            <input type="'.$valores.'" name="'.$campos.'" id="'.$campos.'" value="" />
            </label>
            ';
        $escreve = fwrite($fp, "$fomu");
        echo '<br />';
        echo 'Campos de texto Gerado';
    }elseif($valores == 'textarea'){

        $tx_areal = '
            <label class="line">
			<span class="data">
			'.ucfirst($campos).':</span>
            <textarea name="'.$campos.'" id="'.$campos.'" rows="3" cols="8"></textarea>
            </label>
            ';
        $escreve = fwrite($fp, "$tx_areal");
        $escreve = fwrite($fp, "<br />");
        $escreve = fwrite($fp, "<br />");
        echo '<br />';
        echo '<br />';
        echo 'Campo de Area de texto gerado';
    }elseif($valores == 'select'){
         
        if($campos == 'uf'){
            $tx_select = '
            <label class="line">
			<span class="data">'.ucfirst($campos).':</span>
                <select class="ui selection dropdown" name="'.$campos.'" id="'.$campos.'" >
                     <?php $db->uf(); ?>
                </select>
            </label>
            ';
        $escreve = fwrite($fp, "$tx_select");
        echo '<br />';
        echo '<br />';
        echo 'Campo Select gerado';
        }else{
          $tx_select = '
            <label class="line">
			<span class="data">'.ucfirst($campos).':</span>
                <select class="ui selection dropdown" name="'.$campos.'" id="'.$campos.'" >
                   <option>-- Selecione --</option>
                </select>
            </label>
            ';
        $escreve = fwrite($fp, "$tx_select");
        echo '<br />';
        echo '<br />';
        echo 'Campo Select gerado';  
        }
        
    }


    $escreve = fwrite($fp, "\n");
endforeach;

$submit = '<input type="submit" class="btn btn-default" name="submit" id="submit" value="gravar" style="margin-top: 10px; margin-right: 1000px;">';
$escreve = fwrite($fp, "$submit");
$escreve = fwrite($fp, "
</form>
</div>
");
fclose($fp);