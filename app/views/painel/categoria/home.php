<?= $this->layout('painel/_template', ['name' => 'Catálogo']) ?>

<!-- top bar -->
<div class="col-12 mb-3 d-flex" style="position: relative;">
	<!-- nome da página -->
	<span class="title">Categorias</span>

	<!-- btn close -->
	<a href="<?= URL ?>sair" id="btn-sair" class="btn-cataligo shadow bg-dark-red text-white">Sair</a>
</div>

<?php if (!$categorias) : ?>
	<div class="col-12">
		<div class="alert alert-primary" role="alert">
			Cadastre uma nova categoria!
		</div>
	</div>
<?php endif ?>

<div class="col-12"><label class="form-label">Nome da categoria</label></div>

<form action="<?= URL ?>categorias" method="post" class="row">
	<div class="col-8">
		<input type="text" name="name" placeholder="Ex: Pizzas" class="form-control" required>
	</div>
	<div class="col-4">
		<button class="btn bg-default text-white shadow w-100">Salvar</button>
	</div>
</form>

<?php if ($categorias) : ?>

	<!-- nome da categoria -->
	<div class="col-12 mt-3">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nome</th>
					<th scope="col" class="d-flex justify-content-end">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($categorias as $key => $item) : ?>
					<tr>
						<th scope="row"><?= $key + 1 ?></th>
						<!-- nome -->
						<td><?= $item->name ?></td>
						<td class="d-flex justify-content-end">
							<a href="<?= URL ?>categorias/editar/<?= $item->id ?>" class="btn-small bg-green color-black"><i class="material-icons">edit</i></a>
							<a href="<?= URL ?>categorias/deletar/<?= $item->id ?>" class="btn-small bg-dark-red text-white ms-1"><i class="material-icons">delete</i></a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

<?php endif ?>