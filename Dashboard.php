<?php
    session_start();
    if($_SESSION['Status Login'] != TRUE)
    {
        echo'<script>window.location="Login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="Css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!--Header-->
    <Header>
        <div class="container">
            <h1><a href="Dashboard.php">Warung Noesantara</a></h1>
            <ul>
                <li><a href="Dashboard.php">Dashboard</a></li>
                <li><a href="Admin.php">Profil</a></li>
                <li><a href="Kategori.php">Data Kategori</a></li>
                <li><a href="Produk.php">Data Produk</a></li>
                <li><a href="Pesanan.php">Data Pesanan</a></li>
                <li><a href="Keluar.php">Logout</a></li>
            </ul>
        </div>
    </Header>
    <!--Content dasboard-->
    <div class="section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['admin']-> Nama_Admin?> di halaman Admin</h4>
            </div>
        </div>
    </div>

    <!--Footer-->
    <footer>
        <div class="container">
            <small>copyright @Muhammad Nur Muiz, 2023 - Warung Noesantara</small>
        </div>
    </footer>
</body>
</html>