<?= $this->layout('painel/_template', ['name' => 'Pedidos']) ?>

<!-- top bar -->
<div class="col-12 mb-3 d-flex" style="position: relative;">
	<!-- nome da página -->
	<span class="title">Pedidos</span>

	<!-- btn status -->
	<?php foreach ($perfil as $item) : ?>
		<a href="<?= URL ?>status" class="btn-cataligo shadow ms-4 color-black <?= $item->status ? 'bg-green' : 'bg-red'; ?>"><?= $item->status ? 'Aberto' : 'Fechado' ?></a>
	<?php endforeach ?>

	<!-- btn close -->
	<a href="<?= URL ?>sair" id="btn-sair" class="btn-cataligo shadow bg-dark-red text-white">Sair</a>
</div>
