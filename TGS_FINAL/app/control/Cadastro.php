<?php

$pdo = new PDO('mysql:dbname=proj_sql;host=localhost','root','abaDOORestd17sqlo349'); /**'user, dbname', 'login', 'senha' */
//atributo posto na conexão--> assim o próprio pdo já envia uma mensagem de erro
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$bd_user = "root";
$bd_server = "localhost";
$bd_senha = "abaDOORestd17sqlo349";
$bd_nome = "proj_sql";
$connection = mysqli_connect($bd_server, $bd_user, $bd_senha, $bd_nome);

$sql = "select * from usuario";

//Início de teste de conexão com o PDO
if(!$pdo){
    echo "Falha na conexão";
} else {

    //CREATE (INSERT) do CRUD
    if(isset($_POST['email'])){

        //Essas são as váriaveis que estão recebendo os valores dos input's do HTML da página de cadastro
        $nome_usu = $_POST["usu"];
        $nome_real = $_POST["n_real"];
        $email = $_POST["email"];
        //senha sendo criptografada com md5 para o banco de dados
        $senha = md5(md5($_POST["senha"]));
        $dt_nsc = $_POST["dt_nsc"];

        //Verificação do último id da tabela
        $id = -1;
        $stmt= mysqli_query($connection,$sql);
        while($row = mysqli_fetch_array($stmt,MYSQLI_ASSOC)){
            if($id<$row['ID_USUARIO']){
                $id=$row['ID_USUARIO'];
            }
        }
        $id++;

        //variavel de valor nulo para o registro de url de imagens
        $n=null;

        $sql_stmt = $pdo->prepare("INSERT INTO USUARIO (id_usuario,nome_usuario,nome_real,dtnsc,email,senha,fk_imagem_id_img) VALUES (:id_usu,:nome_usu,:nome_real,:dt_nsc,:email,:senha,:fk_id_img)");
        /*$sql_stmt->bindParam('isssssi', $id,$nome_usu,$nome_real,$dt_nsc,$email,$senha,$n);*/
        $sql_stmt->bindParam(':id_usu', $id);
        $sql_stmt->bindParam(':nome_usu', $nome_usu);
        $sql_stmt->bindParam(':nome_real', $nome_real);
        $sql_stmt->bindParam(':dt_nsc', $dt_nsc);
        $sql_stmt->bindParam(':email', $email);
        $sql_stmt->bindParam(':senha', $senha);
        $sql_stmt->bindParam(':fk_id_img', $n);

        $sql_stmt->execute();
    }

}


?>
