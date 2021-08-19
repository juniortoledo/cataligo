<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cataligo</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  
  <!-- bootstrap 5 -->
  <link rel="stylesheet" href="<?= ASSETS ?>css/bootstrap.css">
  <link rel="stylesheet" href="<?= ASSETS ?>css/main.css">
</head>

<body class="bg-default">

  <nav class="navbar navbar-expand-lg navbar-light bg-default shadow">
    <div class="container-fluid">
      <a class="navbar-brand w-100 d-flex justify-content-center align-items-center mt-1" href="<?= URL ?>">
        <img src="<?= ASSETS ?>img/logo.svg" alt="logo-cataligo">
      </a>
    </div>
  </nav>

  <!-- menu -->
  <div class="container">
    <div class="row mt-5">
      <div class="col-12 d-flex justify-content-center">
        <a class="home-link" href="<?= URL ?>funcionalidades">Funcionalidades</a>
        <a class="home-link ms-3 me-3" href="<?= URL ?>preco">Preço</a>
        <a class="home-link" href="<?= URL ?>login">Login</a>
      </div>
    </div>
  </div>

  <?= $this->section('content') ?>

  <!-- bootstrap js 5 -->
  <script src="<?= URL ?>assets/js/bootstrap.js"></script>
</body>

</html>