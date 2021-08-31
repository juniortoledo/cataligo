<?= $this->layout('painel/_template', ['name' => 'Catálogo']) ?>

<!-- top bar -->
<div class="col-12 mb-3 d-flex" style="position: relative;">
	<!-- nome da página -->
	<span class="title">Categorias</span>

	<!-- btn voltar -->
	<a href="<?= URL ?>categorias" class="btn-cataligo shadow bg-green color-black ms-3">Voltar</a>

	<!-- btn close -->
	<a href="<?= URL ?>sair" id="btn-sair" class="btn-cataligo shadow bg-dark-red text-white">Sair</a>
</div>

<div class="col-12"><label class="form-label">Editar nome</label></div>

<?php foreach ($categoria as $item) : ?>
	<form action="<?= URL ?>categorias/editar" method="post" class="row">
		<div class="col-8">
			<!-- id da categoria -->
			<input type="hidden" name="id" value="<?= $item->id ?>">

			<!-- nome da categoria -->
			<input type="text" name="name" placeholder="<?= $item->name ?>" class="form-control" required>
		</div>
		<div class="col-4">
			<button class="btn bg-default text-white shadow w-100">Salvar</button>
		</div>
	</form>
<?php endforeach ?>

<?php if (isset($_GET['success'])) : ?>
	<div class="col-12">
		<div class="alert alert-primary mt-4" role="alert">
			Dados alterados!
		</div>
	</div>
<?php endif ?>