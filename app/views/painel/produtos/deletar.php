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

<!-- alerta -->
<div class="alert alert-danger col-12" role="alert">
	Ao deletar a categoria, o sistema deleta todos os produtos relacionados a ela!
</div>

<div class="col-12 mt-3">
	<form action="<?= URL ?>categorias/deletar" method="post">
		<!-- id da categoria -->
		<input type="hidden" name="id" value="<?= $id ?>">

		<button class="btn bg-dark-red text-white shadow">Quero Deletar</button>
	</form>
</div>