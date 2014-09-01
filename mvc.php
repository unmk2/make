<?php
echo $_GET[tipo];
$post = $_POST['valida'];
if($post == 'ok'){
    $campo = $_POST['campo'];
    $tabela = $_POST['tabela'];

    //GERACAO DA CLASS MODEL
    $dir = "../app/models/";
    $fp = fopen($dir."$tabela".'Model.php', "a");
    $valor = '<?php
class '.$tabela.'Model extends Model{
    public $_tabela = '.'"'.$tabela.'"'.';

    public function lista'.ucfirst($tabela).'($where,$qtd, $offset = null){
        return $this->read($where, $qtd, $offset, \'id DESC\' );
    }
}
';

    $escreve = fwrite($fp, "$valor");
    fclose($fp);
    /*
        foreach($campo as $valor):
            echo $valores = '$'.$valor.' = $_POST['.$valor.']'."\n";

            endforeach;

    */
}else{

}


?>