<?php
$hostname ='localhost';
$Username ='root';
$Password ='';
$DbName ='penulisan ilmiah';

$koneksi = mysqli_connect($hostname, $Username, $Password, $DbName) or die('Gagal terhubung ke database');
?>