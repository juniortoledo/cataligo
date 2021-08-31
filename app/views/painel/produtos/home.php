<?= $this->layout('painel/_template', ['name' => 'Catálogo']) ?>

<!-- top bar -->
<div class="col-12 mb-3 d-flex" style="position: relative;">
	<!-- nome da página -->
	<span class="title">Produtos</span>

	<!-- btn adicionar produto -->
	<button type="button" class="btn-cataligo shadow bg-green color-black ms-3 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
		<i class="material-icons me-2">add</i>Novo
	</button>

	<!-- btn close -->
	<a href="<?= URL ?>sair" id="btn-sair" class="btn-cataligo shadow bg-dark-red text-white">Sair</a>
</div>

<?php if ($produtos) : ?>

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
				<?php foreach ($produtos as $key => $item) : ?>
					<tr>
						<th scope="row"><?= $key + 1 ?></th>
						<!-- nome -->
						<td><?= $item->name ?></td>
						<td class="d-flex justify-content-end">
							<a href="<?= URL ?>produtos/editar/<?= $item->id ?>" class="btn-small bg-green color-black"><i class="material-icons">edit</i></a>
							<a href="<?= URL ?>produtos/deletar/<?= $item->id ?>" class="btn-small bg-dark-red text-white ms-1"><i class="material-icons">delete</i></a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
<?php else : ?>
	<div class="alert alert-primary" role="alert">
		Você não tem produtos cadastrados!
	</div>
<?php endif ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Novo produto</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<form action="<?= URL ?>produtos" method="post" enctype="multipart/form-data">
					<!-- foto do produto -->
					<label for="formFile" class="form-label">Foto do produto</label>
					<input class="form-control" type="file" name="image" id="formFile" required>
					<!-- name -->
					<label class="form-label mt-3">Nome</label>
					<input type="text" name="name" class="form-control" required>

					<!-- descrição -->
					<label class="form-label mt-3">Descrição</label>
					<input type="text" name="sobre" class="form-control mt-3" required>

					<!-- Valor -->
					<label class="form-label mt-3">Preço</label>
					<input type="number" name="valor" class="form-control" required>

					<!-- categoria -->
					<label class="form-label mt-3">Categoria</label>
					<select class="form-select" aria-label="Default select example" name="categoria" required>
						<?php foreach ($categorias as $item) : ?>
							<option value="<?= $item->id ?>"><?= $item->name ?></option>
						<?php endforeach ?>
					</select>

					<!-- disponibilidade -->
					<label class="form-label mt-3">Disponibilidade</label>
					<select class="form-select" aria-label="Default select example" name="status" required>
						<option value="0">Indisponível</option>
						<option value="1">Disponível</option>
					</select>

					<!-- submit -->
					<button class="btn w-100 mt-3 bg-default text-white shadow">Adicionar</button>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>