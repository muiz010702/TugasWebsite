<?php
    session_start();
    include 'koneksi.php';
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
    <title>Data Kategori</title>
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
            <h3>Data Kategori</h3>
            <div class="box">
                <p><a href="Tambah-Kategori.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $No=1;
                            $Kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY Id_kategori DESC");
                            if(mysqli_num_rows($Kategori) > 0){
                            while ($row = mysqli_fetch_array($Kategori)){
                            
                        ?>
                        <tr>
                            <td><?php echo $No++?></td>
                            <td><?php echo $row['Nama_kategori']?></td>
                            <td>
                                <a href="Update-Kategori.php?id=<?php echo $row['Id_kategori']?>">Update</a> || <a href="Delete-Kategori.php?idk=<?php echo $row['Id_kategori']?>" onclick="return confirm('apakah anda yakin ingin menghapus kategori ini!!')">Delete</a>
                            </td>
                        </tr>
                        <?php } }else { ?>
                            <tr>
                                <td colspan="3">Tidak ada data</td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
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