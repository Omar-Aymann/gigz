<?php
require_once './config/config.php';
require_once './config/Database.php';

$db = new Database();
$db->query("SELECT * FROM projects");
$results = $db->getAllResults();
$db->query('SELECT * FROM skills');
$skills = $db->getAllResults();
