<?php
    session_start();
    include 'koneksi.php';
    if($_SESSION['Status Login'] != TRUE)
    {
        echo'<script>window.location="Login.php"</script>';
    }

    $Produk=mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE ID_produk = '".$_GET['id']."'");
    if(mysqli_num_rows($Produk) == 0){
        echo'<script>window.location="Produk.php"</script>';
    }
    $p = mysqli_fetch_object($Produk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Produk</title>
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
            <h3>Update Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="Kategori" required>
                        <option value="">--Pilih--</option>
                        <?php
                            $Kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY Id_kategori DESC");
                            while($R = mysqli_fetch_array($Kategori)){
                        ?>
                        <option value="<?php echo $R['Id_kategori'] ?> <?php echo($R['Id_kategori'] == $p->ID_kategori)? 'Selected':'';?>"><?php echo $R['Nama_kategori']?></option>
                        <?php }?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk">
                    <input type="text" name="Harga" class="input-control" placeholder="Harga Produk">
                    <img src="Produk/<?php echo $p->Gambar_produk?>" width="100px">
                    <input type="hidden" name="foto" value="<?php echo $p->Gambar_produk?>">
                    <input type="file" name="Gambar" class="input-control">
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                    <select class="input-control" name="Status">
                        <option value="">--Pilih--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                   
                    <input type="Submit" name="Simpan" value="Simpan" class="btn">
                </form>
                        <?php
                            if(isset($_POST['Simpan']))
                            {
                                //data inputan dari form
                                $kategori = $_POST['Kategori'];
                                $nama = $_POST['nama'];
                                $Harga = $_POST['Harga'];
                                $Status = $_POST['Status'];
                                $Deskripsi = $_POST['deskripsi'];
                                $foto = $_POST['foto'];

                                


                                //data gambar yang baru
                                $filename = $_FILES['Gambar']['name'];
                                $tmp_name = $_FILES['Gambar']['tmp_name'];

                                $type = explode('.',$filename);
                                $type1 = $type[1];

                                $newname = 'produk'.time().'.'.$type1;

                                 //menampung format file yang diijinkan
                                 $format = array('jpg','jpeg','png','gif');


                                //jika admin ganti gambar
                                if($filename != '')
                                {
                                    if(!in_array($type1, $format))
                                    {
                                        echo '<script>alert("format file tidak ada")</script>';
                                    }
                                    else
                                    {
                                        unlink('./Produk/'.$foto);
                                        move_uploaded_file($tmp_name, './Produk/'.$newname);
                                        $namagambar = $newname;
                                    }
                                }
                                else
                                {
                                    //jika admin tidak ganti gambar
                                    $namagambar = $foto;
                                }
                                    //query update produk
                                    $Update = mysqli_query($koneksi, "UPDATE tb_produk SET 
                                        Id_kategori = '".$kategori."',
                                        Nama_Produk = '".$nama."',
                                        Harga_produk = '".$Harga."',
                                        Deskripsi_Produk = '".$Deskripsi."',
                                        Gambar_produk = '".$namagambar."',
                                        Status_produk = '".$Status."'
                                        WHERE ID_produk = '".$p->ID_produk."'
                                    ");
                                    if($Update)
                                    {
                                        echo '<script>alert("Produk berhasil diupdate")</script>';
                                        echo '<script>window.location="Produk.php"</script>';
                                    }
                                    else
                                    {
                                        echo 'gagal'.mysqli_query($koneksi);
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