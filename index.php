<?php
    include 'koneksi.php';
    $kontak = mysqli_query($koneksi, "SELECT No_admin, Email_admin, Alamat_admin FROM tb_admin WHERE admin_id = 1");
    $F = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warnoes</title>
    <link rel="stylesheet" href="Css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

</head>

<body>
    <!--Header-->
    <Header>
        <div class="container">
            <h1><a href="index.php">Warung Noesantara</a></h1>
            <ul>
                <li><a href="Warnoes.php">Produk</a></li>
            </ul>
        </div>
    </Header>
    <!--Bagian Pencarian Produk-->
    <div class="search">
        <div class="container">
            <form action="Warnoes.php">
                <input type="text" name="search" placeholder="Cari Produk disini">
                <input type="Submit" name="Cari" value="Cari Produk">
            </form>
        </div>
    </div>
    <!--Bagian Kategori-->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY Id_kategori DESC Limit 3");
                    if(mysqli_num_rows($kategori) > 0)
                    {
                        while($K = mysqli_fetch_array($kategori)){
                ?>
                <a href="Warnoes.php?Kategori=<?php echo $K['Id_kategori']?>">
                    <div class="col-3">
                        <img src="Kategori/Kategori-img.jpeg" width="70px" style="margin-bottom:10px;">
                        <p><?php echo $K['Nama_kategori']?></p>
                    </div>
                </a>
                <?php } }else {?>
                    <p>Kategori tidak ada</p>
                <?php }?>
            </div>
        </div>
    </div>
    <!--Bagian Produk-->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                    <?php
                        $Produk = mysqli_query($koneksi, "SELECT * FROM tb_produk ORDER BY ID_produk DESC");
                        if(mysqli_num_rows($Produk) > 0){
                            while($P = mysqli_fetch_array($Produk)){
                    ?>
                        <div class="col-10">
                            <img src="Produk/<?php echo $P['Gambar_produk']?>">
                            <p class="Nama"><?php echo $P['Nama_Produk']?></p>
                            <p class="Harga">Rp.<?php echo $P['Harga_produk']?></p>
                            <p class="Deskripsi"><?php echo $P['Deskripsi_Produk']?></p>
                            <form action="http://localhost/Penulisan%20Ilmiah/Beli.php">
                                <input class="btn-11" type="submit" value="Beli">
                            </form>
                        </div>
                    <?php }}else{ ?>
                        <p>Produk Tidak ada</p>
                    <?php } ?>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <div class="footer">
        <div class="container">
            <H4>Alamat</H4>
            <p><?php echo $F-> Alamat_admin?></p>
            <H4>Email</H4>
            <p><?php echo $F-> Email_admin?></p>
            <H4>No HP</H4>
            <p><?php echo $F-> No_admin?></p>
            <small>copyright @Muhammad Nur Muiz, 2023 - Warung Noesantara</small>
        </div>
    </div>
</body>
</html>