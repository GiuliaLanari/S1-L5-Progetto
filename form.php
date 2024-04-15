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


$errors =[];



if ($_SERVER["REQUEST_METHOD"]=== "POST"){
    
    
  $titolo = $_POST ["titolo"]?? "";
  $autore = $_POST ["autore"]?? "";
  $anno_pubblicazione = $_POST ["anno_pubblicazione"]?? "";
  $genere = $_POST ["genere"]?? "";
  $id = $_POST['id'];
  $img = $_POST['img']?? "";
  
  

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

  if($errors===[]){

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
  }

}

if($_SERVER["REQUEST_METHOD"]=== "GET" || $errors !== []){
  $id = $_GET['id'];

  $stmt = $pdo->prepare("SELECT * FROM libri WHERE id = ?");
  $stmt->execute([$id]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>form</title>
</head>
<body class="bg-dark text-white">
    <h1 class="display-2 text-center my-5">Modifica:</h1>
<div class="row justify-content-center mx-auto"> 
<form action="" method="post" class="col-5  g-3 needs-validation " > 
<input type="hidden" name="id" value="<?= $id ?>">
    <div>

  

  <div class="col-md-12" >
  <label for="img" class="form-label">Immagine:</label>
    <input type="text" class="form-control" name="img" id="img" placeholder="Autore" value="<?=$row["img"] ?>">
  
  </div>
  
  <div class="col-md-12" >
    <label for="titolo" class="form-label">Titolo:</label>
    <input type="text" name="titolo" class="form-control " id="titolo" placeholder="Titolo" value="<?=$row["titolo"] ?>" >
    <div class="error text-danger "><?= $errors["titolo"]?? "" ?></div>
  
  </div>
  <div class="col-md-12">
    <label for="autore" class="form-label">Autore:</label>
    <input type="text" class="form-control" name="autore" id="autore" placeholder="Autore" value="<?=$row["autore"] ?>">
    <div class="error text-danger "><?= $errors["autore"]?? "" ?></div>
   
  </div>

  <div class="col-md-12">
      <label for="anno_pubblicazione" class="form-label">Anno pubblicazione:</label>
      <input type="number" class="form-control" name="anno_pubblicazione" id="anno_pubblicazione" placeholder="Anno pubblicazione" value="<?=$row["anno_pubblicazione"] ?>" >
      <div class="error text-danger "><?= $errors["anno_pubblicazione"]?? "" ?></div>
      
    </div>
  <div class="col-md-12">
      <label for="genere" class="form-label">Genere:</label>
      <input type="text" class="form-control" name="genere" id="genere" placeholder="Genere" value="<?=$row["genere"] ?>">
      <div class="error text-danger "><?= $errors["genere"]?? "" ?></div>
      
    </div>
   
  
  <div class="col-12 justify-content-center d-flex">
    <button class="btn btn-success mt-4" type="submit">Modifica</button>
  </div>
</form>

</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>