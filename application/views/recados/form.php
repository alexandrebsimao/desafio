<?php
	/**
	 * @author Alexandre A. B. Simão <alexandre.b.simao@gmail.com>
	 * @description View formulario para inserção de recados
	 */
?>
<form action="<?php echo base_url(); ?>recados/novo" method="post">

	<label for="nome">Nome</label>
	<input type="text" name="nome" class="form-control" id="nome" value="" required />

	<label for="email">E-mail</label>
	<input type="text" name="email" class="form-control" id="email" value="" required />

	<label for="titulo">Titulo</label> 
	<input type="text" name="titulo" class="form-control" id="titulo" value="" required />

	<label for="texto">Texto</label>
	<textarea name="texto" class="form-control" id="texto" required ></textarea>

	<br>

	<button type="submit" class="btn btn-primary">Salvar</button>
</form>