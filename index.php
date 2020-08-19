<!DOCTYPE html>
<html>
<head>
	<title>PHP_list</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.6/dist/css/uikit.min.css" />
</head>
<body>
	<nav class="uk-navbar-container" uk-navbar>
	    <div class="uk-navbar-left">
	        <ul class="uk-navbar-nav">
	            <li class="uk-active uk-logo">
				<a href="/">PHP_list</a>
	            </li>
	        </ul>
	    </div>
	</nav>
	<?php
	require('./valida.php');
	$db = new SQLite3('./lista.db');
	$db->exec("CREATE TABLE IF NOT EXISTS tarefas(id INTEGER PRIMARY KEY, titulo VARCHAR(245), descricao TEXT, data DATE)");
	?>
	<div class="uk-container-small uk-align-center uk-padding-large uk-padding-remove-top">
		<form action="./index.php" method="POST">
			<div>
				<div class="uk-margin">
					<input class="uk-input" type="text" name="titulo" placeholder="tilulo">
					<?php echo $tituloErr; ?>
				</div>

					<div class="uk-margin">
					<textarea class="uk-textarea" id="descricao" name="descricao" rows="6" placeholder="descrição"></textarea>
					<?php echo $descricaoErr; ?>
				</div>

				<div class="uk-margin">
					<input type="date" id="data" name="data" >
					<div class="uk-text-center">
						<input class="uk-button uk-button-default uk-button-small" type="submit" id="salva" value="salva">
					</div>
					<?php echo $dataErr; ?>
				</div>

				<div class="uk-margin">
				<p class="uk-text-left">
				</p>
			</div>	
		</form>
	</div>

	<div class="uk-container uk-padding-large">
		<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$titulo = $_POST['titulo'];
			$descricao = $_POST['descricao'];
			$data = $_POST['data'];

			if(empty(trim($_POST['titulo'])) || empty(trim($_POST['descricao'])) || empty(trim($_POST['data']))) {
				echo '';		
			}
			else {
				$db->exec("INSERT INTO tarefas(titulo, descricao, data)VALUES('$titulo', '$descricao', '$data')"); 
			}
		}
		
		$db = new SQLite3('./lista.db');
		$res = $db->query("SELECT * FROM tarefas");
				
		while($row = $res->fetchArray()) { ?>
			<div class="uk-padding-small">
				<div class="uk-card uk-card-default uk-card-body uk-padding">
					<h3 class="uk-card-title uk-text-break"><?php echo $row['titulo']; ?></h3>
					<p class="uk-text-break">
						<?php echo $row['descricao'] ?>
					</p>
					<strong class="uk-text-bolt">
						<?php 
						$parte_data = explode("-", $row["data"]);
						echo $parte_data[2] . "/" . $parte_data[1] . "/" . $parte_data[0];
						?>
					</strong>
					<form action="./delete.php" method="POST"> 
						<input type="hidden" name="idx" value=<?php echo $row['id']; ?>>
						<input class="uk-card-badge uk-label uk-button-primary" type="submit" value="X">
					</form>
				</div>
			</div>
		<?php } ?>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.6/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.6/dist/js/uikit-icons.min.js"></script>	
</body>
</html>
