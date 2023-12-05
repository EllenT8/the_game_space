<?php

$bd_user = "root";
$bd_server = "localhost";
$bd_senha = "abaDOORestd17sqlo349";
$bd_nome = "proj_sql";
$connection = mysqli_connect($bd_server, $bd_user, $bd_senha, $bd_nome);

$sql = "select * from usuario";
$usu_confirm=false;
$stmt= mysqli_query($connection,$sql);

while($row = mysqli_fetch_array($stmt,MYSQLI_ASSOC)){
    if($_POST['usu']==$row['NOME_USUARIO']){
        $usu_confirm=true;
        //iniciando o processo de seção se houver um usuário logado no banco de dados

        session_start(); /* começa a sessao*/

        session_set_cookie_params(['lifetime' => 10, 'httponly' => true ]); // httponly = true vai proteger o id do cookie para nao roubarem sua sessao, assim roubando informações suas, um metodo de deixar seguro contra java (document.cookie mostra o id do cookie da sessao o httponly mascara isso e nao aparece nada)
        /* tempo de vida do cookie que vai salvar as informaçoes do usuario, esta setado em segundos entao ali o tempo de vida do cookie é 10 segundos e depois dos 10 segundos ele é apagado e um novo id sera feito para armazenar as informaçoes */
        /* o session set cookie params é pra mudar ele mesmo eu mudei o tempo de vida mas o temp de vida normal é ate o navegador ser fechado entao nao precisamos mudar */

        session_regenerate_id(true); //vai gerar um novo cookie com um novo id depois de fazer o login e se um outro usuario tem sua sessao com o arquivo especifico dela o arquivo sera apagado e so voce tera o arquivo original
        //colocando como true ele deleta os arquivos antigos automaticamente ao inves de esperar pelo garbage collector (o padrao é false) 
        
        $_SESSION['user'] = $_POST['usu'];

        $_SESSION['logged_in'] = true; //verifica se esta loggado

        if(isset($_SESSION['logged_in'])){
            echo($_SESSION['user']);
        }
    }
}

if($usu_confirm==false){
    echo "Não foi possível conectar com o sistema. Usuário inválido";
}

?>


