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




$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT *  FROM libri WHERE id = ?");
$stmt->execute([$id]);


$row = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Details</title>
</head>
<body class="bg-dark text-white">
<div class="container">
  <div class="row">
  <h1 class="display-2 text-center my-5">Dettagli libro:</h1>

  <div class="card mb-3 bg-black text-white" >
  <div class="row g-0">
    <div class="col-md-4">
    <img src="<?= $row["img"] ?>" class="card-img-top" alt="copertina libro">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <div class="d-flex">
         <a href="/S1-L5-Progetto/index.php" class="btn btn-outline-success ms-auto">Home</a>
      </div>
      <h5 class="card-title display-6">Titolo: <?= $row["titolo"] ?></h5>
  <p class="card-text ">Autore: <?= $row["autore"] ?></p>
  <p class="card-text">Pubblicazione: <?= $row["anno_pubblicazione"] ?></p>
  <p class="card-text">Genere: <?= $row["genere"] ?></p>

    </div>
  </div>
</div>



  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>