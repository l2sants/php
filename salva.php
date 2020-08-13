<?php

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];

$db = new SQLite3('./lista.db');
$db->exec("CREATE TABLE IF NOT EXISTS tarefas(id INTEGER PRIMARY KEY, titulo VARCHAR(245), descricao TEXT, data DATE)");

if(empty($titulo)) {
	print_r("titulo vazio");
}
elseif(empty($descricao)) {		
	print_r("descricao vazia");
	
}
elseif(empty($data)) {
	print_r("data vazia");

}
else {
	$db->exec("INSERT INTO tarefas(titulo, descricao, data)VALUES('$titulo', '$descricao', '$data')"); 
}

$res = $db->query("SELECT * FROM tarefas");



?>

<ul>
<?php
while($row = $res->fetchArray()) { ?>
	<li>
		<form acition="./delete.php" method="POST"> 
			<input type="hidden" value=<?php echo $row['id']?>>
			<input type="submit" value="X">
		</form>
		<h4><?php echo $row['titulo']?></h4>
		<p><?php echo $row['descricao']?></p>
		<strong><?php echo $row['data']?></strong>
	</li>
<?php } ?>

</ul>
