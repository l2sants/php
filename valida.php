<?php
$titulo = null;
$descricao = null;
$data = null;

$tituloErr = null;
$descricaoErr = null;
$dataErr = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(empty(trim($_POST['titulo']))) {
		$tituloErr = '<p class="uk-text-danger">titulo vazio</p>';
	}
	else {
		$titulo = $_POST['titulo'];
	}
	if(empty(trim($_POST['descricao']))) {		
		$descricaoErr = '<p class="uk-text-danger">descricao vazia</p>';
	}
	else {
		$descricao = $_POST['descricao'];
	}
	if(empty(trim($_POST['data']))) {
		$dataErr = '<p class="uk-text-danger">data vazia</p>';
	}
	else {
		$data = $_POST['data'];
	}
}
