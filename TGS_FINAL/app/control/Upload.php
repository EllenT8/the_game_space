<?php

$arquivos = $_FILES['arquivo'];
//nomes ==> vetor que irá receber os nomes dos arquivos
$nomes = $arquivos['name'];
//tmp_nomes ==> vetor que irá receber os nomes temporários dos arquivos
$tmp_nomes = $arquivos['tmp_name'];

//preciso selecionar os "tmp_nome" a partir dos índices. Por isso, movo cada nome temporário por índice (o $index)
foreach($nomes as $index => $nome){
    //preciso que cada arquivo tenha um nome único, juntamente com a sua extensão(tipo)
    $extensao = pathinfo($nome, PATHINFO_EXTENSION);
    //uniqid ==> gera caracteres aleatórios
    $novo_nome = uniqid().'.'.$extensao;
    //função para mover (por meio do nome temporario) o arquivo que veio do upload
    move_uploaded_file($tmp_nomes[$index], 'upload/'.$novo_nome);
}

?>