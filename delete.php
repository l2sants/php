<?php
$db = new SQLite3('./lista.db');
$idx = $_POST['idx'];
echo $idx;
if(empty(trim($idx))) {
	print_r("id vazio");
}
else {	
	$db->exec("DELETE FROM tarefas WHERE id = '$idx'");
}

header("Location: index.php");
exit();
