<?php
	/**
	 * @author Alexandre A. B. Simão <alexandre.b.simao@gmail.com>
	 * @description Layout padrão para exibição de views especificas quando chamadas. Layout criado com Bootstrap
	 */
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?> | Recados</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-colapse-1" aria-expanded="false">
				<span sr-only>Menu de Navegção</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?php echo base_url(); ?>" class="navbar-brand">Recados</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url(); ?>recados/index">Todos os Recados</a></li>
        		<li><a href="<?php echo base_url(); ?>recados/aprovados	">Recados Aprovados</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container" id="main">
	<!-- Exibição de mensagens -->
	<div id="main-alert">
		<?php if( (isset($alert) && !empty($alert)) || $alert = $this->session->flashdata('alert') ): ?>
			<div class="alert <?php echo $alert['class']; ?>" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				<?php echo $alert['message']; ?>
			</div>
		<?php endif; ?>
	</div>
	<!-- Titulo da página -->
	<div class="page-header">
		<h1><?php echo isset($title)&&!empty($title) ? $title : ''; ?></h1>
	</div>

	<?php $this->load->view($page); ?>

	<br>

	<div class="container">
		<center>Desenvolvido por Alexandre Augusto Berns Simão | alexandre.b.simao@gmail.com</center>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funcoes.js"></script>

</body>
</html>