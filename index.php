<!DOCTYPE html>
<html>
<head>
	<title>todo-php</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.6/dist/css/uikit.min.css" />	
</head>

<body>
	<div class="uk-container uk-flex uk-flex-center uk-container-large">
		<form action="./salva.php" method="POST">
			<div>
				<div class="uk-margin">
					<input class="uk-input" type="text" name="titulo">
				</div>

				 <div class="uk-margin">
            		<textarea class="uk-textarea" name="descricao" rows="2" placeholder="Textarea"></textarea>
        	    </div>

				<div class="uk-margin">
					<input type="date"  name="data">
				</div>

				<div class="uk-margin">
					<input class="uk-button uk-button-default" type="submit" value="salva">
				</div>
			</div>	
		</form>
	</div>
	<div>
	<div class="uk-container">
	<?php
	$db = new SQLite3('./lista.db');
	$res = $db->query("SELECT * FROM tarefas");
	
	while($row = $res->fetchArray()) { ?>
		<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m">
			<h3 class="uk-card-title"><?php echo $row['titulo']?></h3>
		    <p class="uk-text-break">
				<?php echo $row['descricao']?>
		    </p>
			<strong class="uk-text-muted"><?php echo $row['data']?></strong>
			<form action="./delete.php" method="POST"> 
				<input type="hidden" name="idx" value=<?php echo $row['id']?>>
				<input class="uk-card-badge uk-label uk-button-primary" type="submit" value="X">
			</form>
		</div>
	<?php } ?>
	</div>
	
</body>
</html>
