<?php
	/**
	 * @author Alexandre A. B. Simão <alexandre.b.simao@gmail.com>
	 * @description View para exibição de todos os recados
	 */
?>
<a href="<?php echo base_url(); ?>recados/novo" class="btn btn-default">Novo Recado</a>

<table class="table table-bordered table-condensed recados">
	<thead>
		<tr>
			<th width="20"></th>
			<th width="30">#</th>
			<th>Nome</th>
			<th>E-mail</th>
			<th width="150">Data de Envio</th>
			<th>Titulo</th>
			<th>Texto</th>
			<th width="50">Aprovado</th>
			<th width="20">Remover</th>
		</tr>
	</thead>

	<tbody>
	<?php if( $recados ): ?>
		<?php foreach( $recados as $recado ): ?>
			<tr>
				<td><input type="checkbox" name="list_delete" class="list_delete" value="<?php echo $recado->id; ?>"></td>
				<td><?php echo $recado->id; ?></td>
				<td><?php echo $recado->nome; ?></td>
				<td width="150"><?php echo $recado->email; ?></td>
				<td><?php echo formatDate($recado->data_envio, 'd/m/Y H:i:s'); ?></td>
				<td width="200"><?php echo $recado->titulo; ?></td>
				<td><?php echo $recado->texto; ?></td>
				<td>
					<center>
					<?php if( $recado->aprovado == '0' ): ?>
						<a href="#<?php echo $recado->id; ?>" class="glyphicon glyphicon-unchecked aprovar" title="Aprovar recado"></a>
					<?php else: ?>
						<i class="glyphicon glyphicon-check green" title="Aprovado"></i>
					<?php endif; ?>
					</center>
				</td>
				<td>
					<center>
						<a href="<?php echo base_url() . 'recados/remover/' . $recado->id; ?>" class="glyphicon glyphicon-remove" onclick="return alertRemove();"></a>
					</center>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="9">Nenhum registro foi encontrado!</td>
		</tr>
	<?php endif; ?>
	</tbody>

</table>

<div class="container-fluid">
	<?php echo $pagination; ?>
</div>

<div class="container-fluid">
	<button type="button" class="btn btn-danger" id="remover_lista" onclick="return alertRemove();">Remover Selecionados</button>
</div>