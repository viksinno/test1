<?php
require_once 'TodoList.php';

$id = isset($_POST['id']) ? $_POST['id'] : '';
$id->markItemDone($id);

header('Location: list.php');
?>