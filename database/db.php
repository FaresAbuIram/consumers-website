<?php

$host = "ec2-3-81-240-17.compute-1.amazonaws.com";
$user = "rujyezqmvonpxe";
$password = "693904463cbd8597e8b5666ecdf0e796446dcdc82f6d5e0d640b710f9e7f3f1a";
$dbname = "d7kmh81qpvgf01";
$port = "5432";


try {

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed :" . $e->getMessage();
}
