<?php

$pdo = new PDO('mysql:dbname=proj_sql;host=localhost','root','abaDOORestd17sqlo349'); /**'user, dbname', 'login', 'senha' */
//atributo posto na conexão--> assim o próprio pdo já envia uma mensagem de erro
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Início de teste de conexão com o PDO
if(!$pdo){
    echo "Falha na conexão";
} else {
    //READ (SELECT) do CRUD
    $sql_stmt = $pdo->prepare("SELECT * FROM USUARIO");
    $sql_stmt->execute();
    $fetch = $sql_stmt->fetchAll();

    echo '_________________________________________________________<br>';
    echo '|_______ID_USUARIO_______|_______NOME_USUARIO_______|<br>';
    foreach($fetch as $key=> $value){
        echo'|____________'. $value['ID_USUARIO'] . '_____________|________ ' . $value['NOME_USUARIO'] ;
        echo "<br>";
    }

    //UPDATE do CRUD
    $sql_stmt = $pdo->prepare("UPDATE USUARIO SET NOME_USUARIO = 'EllenS2' WHERE ID_USUARIO = 16");
    $sql_stmt->execute();

    //DELETE do CRUD
    $sql_stmt = $pdo->prepare("DELETE FROM USUARIO WHERE ID_USUARIO = :id_usuario");
    $id_param = 18;
    $sql_stmt->bindParam(':id_usuario', $id_param);
    $sql_stmt->execute();

}


?>
