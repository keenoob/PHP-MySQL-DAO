<?php
require_once("config.php");

$sql = new sql();

$usuarios = $sql->select("select * from tb_usuarios");

echo json_encode($usuarios);