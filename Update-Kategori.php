<?php
    session_start();
    include 'koneksi.php';
    if($_SESSION['Status Login'] != TRUE)
    {
        echo'<script>window.location="Login.php"</script>';
    }

    $Kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE Id_kategori = '".$_GET['id']."' ");
    if(mysqli_num_rows($Kategori) == 0)
    {
        echo '<script>window.location="Kategori.php"</script>';
    }
    $K = mysqli_fetch_object($Kategori);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Kategori</title>
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
            <h3>Update Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="Nama" placeholder="Masukan Kategori" class="input-control" value="<?php echo $K->Nama_kategori?>">
                    <input type="Submit" name="Simpan" value="Simpan" class="btn">
                </form>
                <?php
                    if(isset($_POST['Simpan']))
                    {
                        $nama = ucwords($_POST['Nama']);

                       $Update = mysqli_query($koneksi, "UPDATE tb_kategori SET
                                 Nama_kategori = '".$nama."'
                                 WHERE Id_kategori = '".$K->Id_kategori."' ");
                        if($Update)
                        {
                            echo '<script>alert("Update kategori berhasil ")</script>';
                            echo '<script>window.location="Kategori.php"</script>';
                        }
                        else
                        {
                            echo 'gagal'.mysqli_error($koneksi);
                        }
                    }
                ?>
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