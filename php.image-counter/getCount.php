<?php
require 'db.php';

$count_check = $pdo->query('SELECT COUNT(*) FROM visits');
$count =$count_check->fetchColumn();