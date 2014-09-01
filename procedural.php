<?php
$campo = $_POST['campo'];
$tabela = $_POST['tabela'];
$tab = $_POST['tab'];
$tipo = $_POST['tipo'];
$botao = $_POST['botao'];
$vetores = array_combine($tab,$tipo);


//GERACAO DO ARQUIVO GRAVAR
$dir2 = "../modulos/";
if(is_dir("modulos/$tabela")){
echo 'Diretorio ja cirado nada a fazer';
}else{
    $pasta = mkdir($dir2.'/'.$tabela.'/', 0777);

}
$dir = "../modulos/$tabela/";
$cad = $_POST['cad'];

if($cad == 1){
include ('proced_insert.php');

//FORMULARIO

include ('proced_form.php');

}


$list = $_POST['list'];

if($list == 1){
//GERAÇÃO DO MENU LISTAGEM
echo '<br />';
echo '<br />';
echo 'arquivo listagem criado';
include('proced_listagen.php');
}

$dell = $_POST['dell'];
if($dell == 1){
//GERAÇÃO DO ARQUIVO PARA DELETA
echo '<br />';
echo '<br />';
echo 'Criado delet consucesso';
include('proced_del.php');
}

$edit = $_POST['edit'];

if($edit == 1){
//GERAÇÃO DO ARQUIVO PARA EDITA
echo '<br />';
echo '<br />';
echo 'Criado delet consucesso';
include('proced_edit.php');
}


$comando = 'sudo chmod -R 777 /var/www/provedor';
shell_exec($comando);