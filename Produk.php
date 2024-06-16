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
    <title>Data Produk</title>
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
            <h3>Data Produk</h3>
            <div class="box">
                <p><a href="Tambah-Produk.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Gambar Produk</th>
                            <th>Deskirpsi Produk</th>
                            <th>Status Produk</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $No=1;
                            $Produk = mysqli_query($koneksi, "SELECT * FROM tb_produk LEFT JOIN tb_kategori USING (Id_kategori)ORDER BY ID_produk DESC");
                            if(mysqli_num_rows($Produk) > 0){
                            while ($row = mysqli_fetch_array($Produk)){
                            
                        ?>
                        <tr>
                            <td><?php echo $No++?></td>
                            <td><?php echo $row['Nama_kategori']?></td>
                            <td><?php echo $row['Nama_Produk']?></td>
                            <td>Rp.<?php echo number_format($row['Harga_produk'])?></td>
                            <td><a href="Produk/<?php echo $row['Gambar_produk']?>"><img src="Produk/<?php echo $row['Gambar_produk']?>" width="50px"></a></td>
                            <td><?php echo $row['Deskripsi_Produk']?></td>
                            <td><?php echo ($row['Status_produk'] == 0)?'Tidak aktif':'Aktif'; ?></td>
                            <td>
                                <a href="Update-Produk.php?id=<?php echo $row['ID_produk']?>">Update</a> || <a href="Delete-Produk.php?idp=<?php echo $row['ID_produk']?>" onclick="return confirm('apakah anda yakin ingin menghapus kategori ini!!')">Delete</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="8">Tidak ada data</td>
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