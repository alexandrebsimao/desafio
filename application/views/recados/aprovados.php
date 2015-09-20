<?php
	/**
	 * @author Alexandre A. B. Simão <alexandre.b.simao@gmail.com>
	 * @description View para exibição dos recados aprovados
	 */
?>
<form action="<?php echo base_url(); ?>recados/aprovados" method="post">
	<div class="row">
		<div class="col-md-2">
			<input type="text" name="data" id="data" maxlength="10" class="form-control">
		</div>
		<div class="col-md-1">
			<button class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
		</div>
	</div>
</form>

<br>

<table class="table table-bordered table-condensed recados">
	<thead>
		<tr>
			<th width="20">#</th>
			<th>Nome</th>
			<th>E-mail</th>
			<th width="150">Data de Envio</th>
			<th>Titulo</th>
			<th>Texto</th>
		</tr>
	</thead>

	<tbody>
	<?php if( $recados ): ?>
		<?php foreach( $recados as $recado ): ?>
			<tr>
				<td><?php echo $recado->id; ?></td>
				<td><?php echo $recado->nome; ?></td>
				<td width="150"><?php echo $recado->email; ?></td>
				<td><?php echo formatDate($recado->data_envio, 'd/m/Y H:i:s'); ?></td>
				<td width="200"><?php echo $recado->titulo; ?></td>
				<td><?php echo $recado->texto; ?></td>
			</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="6">Nenhum registro foi encontrado!</td>
		</tr>
	<?php endif; ?>
	</tbody>

</table>

<?php echo $pagination; ?>
