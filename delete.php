<?php

$db = new SQLite3('./lista.db');
$idx = $_POST['idx'];

if(empty($idx)) {
	print_r("id vazio");
}
else {	
	$db->exec("DELETE FROM tarefas WHERE id = '$id'");
}




?>
