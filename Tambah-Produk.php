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
    <title>Tambah Produk</title>
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
            <h3>Tambah Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="Kategori" required>
                        <option value="">--Pilih--</option>
                        <?php
                            $Kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY Id_kategori DESC");
                            while($R = mysqli_fetch_array($Kategori)){
                        ?>
                        <option value="<?php echo $R['Id_kategori']?>"><?php echo $R['Nama_kategori']?></option>
                        <?php }?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="text" name="Harga" class="input-control" placeholder="Harga Produk" required>
                    <input type="file" name="Gambar" class="input-control" required>
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
                                //print_r($_FILES['Gambar']);
                                //menampung imputan dari form
                                $kategori = $_POST['Kategori'];
                                $nama = $_POST['nama'];
                                $Harga = $_POST['Harga'];
                                $Status = $_POST['Status'];
                                $Deskripsi = $_POST['deskripsi'];

                                //menampung data file yang diupload
                                $filename = $_FILES['Gambar']['name'];
                                $tmp_name = $_FILES['Gambar']['tmp_name'];

                                $type = explode('.',$filename);
                                $type1 = $type[1];

                                $newname = 'produk'.time().'.'.$type1;

                                //menampung format file yang diijinkan
                                $format = array('jpg','jpeg','png','gif');

                                //validasi format file
                                if(!in_array($type1, $format))
                                {
                                    echo '<script>alert("format file tidak ada")</script>';
                                }
                                else 
                                {
                                    //jika format file sesuai dengan yang ada di dalam format array
                                    //proses upload file serta insert ke database
                                    move_uploaded_file($tmp_name, './Produk/'.$newname);

                                    $insert = mysqli_query($koneksi, "INSERT INTO tb_produk VALUES(
                                    NULL,
                                    '".$kategori."',
                                    '".$nama."',
                                    '".$Harga."',
                                    '".$newname."',
                                    '".$Deskripsi."',
                                    '".$Status."')
                                    ");
                                    if($insert)
                                    {
                                        echo '<script>alert("Produk berhasil ditambahkan")</script>';
                                        echo '<script>window.location="Produk.php"</script>';
                                    }
                                    else
                                    {
                                        echo 'gagal'.mysqli_query($koneksi);
                                    }
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