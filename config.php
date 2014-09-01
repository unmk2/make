<?php
$servidor = "localhost";
$dbname = "facu";
$usuario = "root";
$password = "455ttte";

if(!($id = mysql_connect($servidor,$usuario,$password)))
{
   echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit;
}
if(!($con=mysql_select_db($dbname,$id))) {
   echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit;
}
