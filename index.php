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

$search= $_GET["search"] ?? "";

$stmt= $pdo->prepare("SELECT * FROM libri WHERE titolo LIKE :search");
$stmt->execute([
  "search"=> "%$search%"
]);

$books= $stmt->fetchAll();


$stmt = $pdo->prepare("SELECT COUNT(*)  FROM libri WHERE titolo LIKE :search");
$stmt->execute([
 
  "search"=> "%&search%"
]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Libreria</title>
</head>
<body class="bg-dark">

<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid text-white">
  <h1 class="display-6">Libreria</h1>
  <div class="ms-auto me-5" >
<a class="btn btn-success  " href= "http://localhost/S1-L5-Progetto/form-add.php">Add New</a>
</div>  

      <form class="d-flex" role="search" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search"  aria-label="Search" name="search" value="<?= $search ?>">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      
    </div>
  </div>
</nav>
<div class="container mt-5 ">
<div class="row">

<?php
foreach($books as $row){?>
<div class="col-xs-12 col-md-3  g-3 mb-2">
<div class="card bg-black text-white h-100 " >

  <div class="card-body d-flex flex-column">
    <img src="<?= $row["img"] ?>" class="card-img-top" style="height: 15rem; object-fit: cover;" alt="copertina libro">
    
    <h5 class="card-title display-6">Titolo: <?= $row["titolo"] ?></h5>
    <p class="card-text">Autore: <?= $row["autore"] ?></p>
    <p class="card-text">Pubblicazione: <?= $row["anno_pubblicazione"] ?></p>
    <p class="card-text">Genere: <?= $row["genere"] ?></p>


    <div class="mt-auto">
    <a  href= "http://localhost/S1-L5-Progetto/form.php/?id=<?=$row['id'] ?>" class="btn btn-primary mt-2">Modifica</a>
    <a class="btn btn-danger mt-2" href=  "http://localhost/S1-L5-Progetto/delete.php/?id=<?=$row['id'] ?>">Delete</a>
    <a class="btn btn-info mt-2" href=  "http://localhost/S1-L5-Progetto/info.php/?id=<?=$row['id'] ?>">Info</a>

    </div>
   
  </div>
</div>
</div><?php


}


?>




</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>