<?= $this->layout('painel/_template', ['name' => 'Perfil']) ?>
<?php
$json = file_get_contents("assets/js/cep.json");
$estados = json_decode($json);
?>

<!-- top bar -->
<div class="col-12 mb-3 d-flex" style="position: relative;">
	<!-- nome da página -->
	<span class="title">Perfil</span>

	<!-- btn close -->
	<a href="<?= URL ?>sair" id="btn-sair" class="btn-cataligo shadow bg-dark-red text-white">Sair</a>
</div>

<div class="alert alert-primary mb-3" role="alert">
	Complete seu cadastro!
</div>

<!-- form -->
<form action="<?= URL ?>perfil" method="post" class="mb-5" enctype="multipart/form-data">
	<!-- nome -->
	<div class="col-12">
		<label class="form-label">Nome da loja:</label>
		<input type="text" name="name" class="form-control" required>
	</div>

	<!-- sobre -->
	<div class="col-12 mt-3">
		<label class="form-label">Escreva sobre sua loja:</label>
		<input type="text" name="sobre" class="form-control" required>
	</div>

	<!-- imagem da loja -->
	<div class="col-12 mt-3">
		<label for="formFile" class="form-label">Foto da loja:</label>
		<input class="form-control" type="file" name="image" id="formFile">
	</div>

	<!-- Estado -->
	<div class="col-12 mt-3">
		<label class="form-label">Estado:</label>
		<select class="form-select" aria-label="Default select example" name="estado">
			<?php foreach ($estados as $item) : ?>
				<option value="<?= $item->nome ?>"><?= $item->nome ?></option>
			<?php endforeach ?>
		</select>
	</div>

	<!-- cidades -->
	<div class="col-12 mt-3">
		<label class="form-label">Cidades:</label>
		<select class="form-select" aria-label="Default select example" name="cidade">
			<?php foreach ($estados as $item) : ?>
				<?= $cidades = $item->cidades ?>
				<?php foreach ($cidades as $row) : ?>
					<option value="<?= $row ?>"><?= $row ?></option>
				<?php endforeach ?>
			<?php endforeach ?>
		</select>
	</div>

	<!-- bairro -->
	<div class="col-12 mt-3">
		<label class="form-label">Bairro:</label>
		<input type="text" name="bairro" class="form-control"  required>
	</div>

	<!-- rua -->
	<div class="col-12 mt-3">
		<label class="form-label">Rua:</label>
		<input type="text" name="rua" class="form-control" required>
	</div>

	<!-- número -->
	<div class="col-12 mt-3">
		<label class="form-label">Número:</label>
		<input type="text" name="numero" class="form-control" required>
	</div>

	<!-- complemento -->
	<div class="col-12 mt-3">
		<label class="form-label">Complemento:</label>
		<input type="text" name="complemento" class="form-control" required>
	</div>

	<!-- button -->
	<div class="col-12 mt-3">
		<button class="btn bg-default text-white w-100 shadow">Salvar</button>
	</div>
</form>