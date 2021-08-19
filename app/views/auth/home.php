<?= $this->layout('auth/_template') ?>

<div class="container mb-5">
  <div class="row">
    <div class="col-sm-12 col-md-6 mt-5">
      <h1 class="text-white">A solução <span class="text-warning">completa</span>
        <br>para seu negócio.
        <br>Teste grátis
        <br>por 7 dias.
      </h1>
    </div>

    <div class="col-sm-12 col-md-6 mt-5">
      <div class="card shadow">
        <div class="card-body">
          <form action="<?= URL ?>register" method="post">
            <input class="form-control text-center mt-3" type="text" name="name" required placeholder="Nome">
            <input class="form-control mt-3 text-center" type="email" name="email" required placeholder="E-mail">
            <input class="form-control mt-3 text-center" type="password" name="password" required placeholder="Senha">
            <button class="btn bg-orange mt-3 w-100 shadow mb-3 text-white">Cadastrar</button>
          </form>

          <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-danger mb-2" role="alert">
              O e-mail informado já existe!
            </div>
          <?php endif; ?>
        </div>
        <!-- card -->
      </div>
      <!-- col -->
    </div>
    <!-- row -->
  </div>
  <!-- container -->
</div>