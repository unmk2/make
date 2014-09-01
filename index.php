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
    <div id="corpo">
        <div style="float: left; border: solid 1px #000000; margin-right: 10 px;">
            <a href="#" onClick="MM_openBrWindow('query.php','','scrollbars=yes,width=800,height=600')" >Query</a>
      </div>
        <div id="conteudo">
            <form id="tab" name="tab" action="form.php" method="post">
                <div class="geral">
                    <label>Tabela:
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
                    <label>Tipo de Programação
                        <select name="tipo" id="tipo">
                            <option value="mvc">MVC</option>
                            <option value="procedural">procedural</option>
                        </select>
                    </label>
                    <input name="posta" value="posta" type="submit">
                </div>

            </form>


        </div>
    </div> <!--Fin da div corpo -->

    </body>
</htm>
