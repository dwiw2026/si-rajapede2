<?php
require 'vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$pdo = new PDO('mysql:host=127.0.0.1;dbname=sirajapede', 'root', '');
$stmt = $pdo->query("SELECT nama_siswa, jk, asal_sekolah, kebutuhan_khusus FROM alumnis WHERE asal_sekolah = 'SLB Pertiwi Mojokerto'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
