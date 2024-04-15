<?php
$host = 'localhost';
$db   = 'gestione_libreria';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);



if ($_SERVER["REQUEST_METHOD"]=== "POST"){
    
    
    $titolo = $_POST ["titolo"]?? "";
    $autore = $_POST ["autore"]?? "";
    $anno_pubblicazione = $_POST ["anno_pubblicazione"]?? "";
    $genere = $_POST ["genere"]?? "";
    $id = $_POST['id'];
    $img = $_POST['img']?? "";
    
    $errors =[];

    if(strlen($titolo)=== 0){
        $errors["titolo"]= "Il titolo non è stato inserito";
    }

    if(strlen($autore)=== 0){
        $errors["autore"]= "Autore non inserito";
    }

    if(strlen($anno_pubblicazione)=== 0){
        $errors["anno_pubblicazione"]= "Anno publicazione non inserito";
    }

    if(strlen($genere)=== 0 ){
        $errors["genere"]= "Genere non inserito";
    }



}



$stmt = $pdo->prepare("UPDATE libri SET titolo= :titolo, autore= :autore, anno_pubblicazione= :anno_pubblicazione, genere= :genere, img= :img WHERE id=:id");
$stmt->execute([
    'id'=> $id,
    'titolo' => $titolo,
    'autore' => $autore,
    'genere' => $genere,
    'anno_pubblicazione' => $anno_pubblicazione ,
    'img'=> $img,
]);



header("Location: /S1-L5-Progetto/index.php");