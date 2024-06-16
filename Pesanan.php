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
    <title>Data Pesanan</title>
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
            <h3>Data Pesanan</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama Pembeli</th>
                            <th>No Pembeli</th>
                            <th>Tanggal Pembelian</th>
                            <th>Email Pembeli</th>
                            <th>Alamat Pembeli</th>
                            <th width="10px">Aksi</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                    <?php
                            $No=1;
                            $Pesanan = mysqli_query($koneksi, "SELECT * FROM tb_pesanan ORDER BY ID DESC");
                            if(mysqli_num_rows($Pesanan) > 0){
                            while ($row = mysqli_fetch_array($Pesanan)){
                            
                        ?>

                        <tr>
                            <td><?php echo $No++?></td>
                            <td><?php echo $row['Nama_pembeli']?></td>
                            <td><?php echo $row['No_pembeli']?></td>
                            <td><?php echo $row['Tanggal_pembelian']?></td>
                            <td><?php echo $row['Email_pembeli']?></td>
                            <td><?php echo $row['Alamat_pembeli']?></td>
                            <td>
                                <a href="Delete-Pesanan.php?ID=<?php echo $row['ID']?>">Delete</a>
                            </td>
                        </tr>
                        <?php } }else { ?>
                            <tr>
                                <td colspan="6">Tidak ada data</td>
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