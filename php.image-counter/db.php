<?php
function getIp() {
    if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) return $_SERVER['HTTP_CLIENT_IP'];
    if( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) return $_SERVER['HTTP_X_FORWARDED_FOR'];
    return $_SERVER['REMOTE_ADDR'];
}

$driver = 'mysql';
$host = 'localhost';
$db_name = 'image_counter';
$db_user = 'root';
$db_pass = '';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try{
    $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options);
    $ip = getIp();

   /* $sql = 'CREATE TABLE visits (
        ID int NOT NULL AUTO_INCREMENT,
    USER_IP varchar(255) NOT NULL,
    PRIMARY KEY (ID)
    )';*/

    $sql_check = 'SELECT EXISTS (SELECT user_ip FROM visits WHERE user_ip = :ip)';
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute(['ip' => $ip]);

    if (!$stmt_check->fetchColumn()) {
        $sql = 'INSERT INTO visits (user_ip) VALUES (:ip)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':ip' => $ip]);
    }
}catch(PDOException $e){
    die("Не могу подключиться к базе данных");
}