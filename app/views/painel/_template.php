<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cataligo <?= $name ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

  <!-- bootstrap 5 -->
  <link rel="stylesheet" href="<?= ASSETS ?>css/bootstrap.css">
  <link rel="stylesheet" href="<?= ASSETS ?>css/main.css">
</head>

<body class="bg-default">

  <!-- sidenav -->
  <div class="sidenav">
    <div class="container-fluid">
      <!-- logo -->
      <div class="d-flex justify-content-center mt-4 mb-4">
        <a href="<?= URL ?>pedidos">
          <img src="<?= ASSETS ?>img/logo.svg">
        </a>
      </div>

      <!-- btn close menu -->
      <div class="btn bg-orange shadow mb-3 close-menu text-white">Fechar</div>

      <!-- container -->
    </div>
  </div>

  <!-- btn menu -->
  <div class="btn-menu shadow">
    <img src="<?= ASSETS ?>img/menu.svg">
  </div>

  <!-- main -->
  <div class="main shadow">
    <div class="container-fluid mt-4">
      <?= $this->section('content') ?>
    </div>
  </div>

  <!-- bootstrap js 5 -->
  <script src="<?= URL ?>assets/js/bootstrap.js"></script>
  <!-- jquery -->
  <script src="<?= URL ?>assets/js/jquery.js"></script>

  <script>
    $('.btn-menu').click(e => {
      $('.sidenav').attr('style', 'left: 0px !important;')
    })

    $('.close-menu').click(e => {
      $('.sidenav').attr('style', 'left: -400px !important;')
    })
  </script>
</body>

</html>