<?php
    session_start();
    include 'koneksi.php';
    if($_SESSION['Status Login'] != TRUE)
    {
        echo'<script>window.location="Login.php"</script>';
    }

    $query = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE admin_id='".$_SESSION['ID']."'");
    $O = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>
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
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="Nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $O->Nama_Admin?>" required>
                    <input type="text" name="User" placeholder="Masukan Username" class="input-control" value="<?php echo $O->Username?>" required>
                    <input type="text" name="HP" placeholder="No HP" class="input-control" value="<?php echo $O->No_admin?>" required>
                    <input type="Email" name="Email" placeholder="Email" class="input-control" value="<?php echo $O->Email_admin?>" required>
                    <input type="Alamat" name="Alamat" placeholder="Alamat" class="input-control" value="<?php echo $O->Alamat_admin?>" required>
                    <input type="Submit" name="Simpan" value="Update" class="btn">
                </form>
                <?php
                    if(isset($_POST['Simpan']))
                    {
                        $nama = $_POST['Nama'];
                        $User = $_POST['User'];
                        $Hp = $_POST['HP'];
                        $Email = $_POST['Email'];
                        $Alamat = $_POST['Alamat'];

                        $Update = mysqli_query($koneksi, "UPDATE tb_admin SET
                        Nama_admin = '".$nama."',
                        Username = '".$User."',
                        No_admin = '".$Hp."',
                        Email_admin = '".$Email."',
                        Alamat_admin = '".$Alamat."'
                        WHERE admin_id = '".$O->admin_id."'
                        ");

                        if($Update)
                        {
                            echo '<script>alert("Ubah Data Berhasil")</script>';
                            echo '<script>window.location ="Admin.php"</script>';
                        }
                        else 
                        {
                            echo 'Gagal'.mysqli_error($koneksi);
                        }
                    }
                ?>
            </div>

            <h3>Ubah Password Admin</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="Password" name="Pass1" placeholder="Masukan Password Baru" class="input-control" required>
                    <input type="password" name="Pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                    <input type="Submit" name="Update" value="Update Password" class="btn">
                </form>
                <?php
                    if(isset($_POST['Update']))
                    {
                        $Pass1 = $_POST['Pass1'];
                        $Pass2 = $_POST['Pass2'];

                        if($Pass2 != $Pass1)
                        {
                            echo '<script>alert("Konfirmasi tidak berhasil")</script>';
                        }
                        else
                        {
                            $Update2 = mysqli_query($koneksi, "UPDATE tb_admin SET
                                    Paasword = '".MD5($Pass1)."'
                                    WHERE admin_id = '".$O->admin_id."'");
                            if($Update2)
                            {
                                echo '<script>alert("Ubah Password Berhasil")</script>';
                                echo '<script>window.location ="Admin.php"</script>';
                            }
                            else
                            {
                                echo 'Gagal '.mysqli_error($koneksi);
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