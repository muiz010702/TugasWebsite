<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="Css/Pesan.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Form Pembayaran</h1>
    <?php
    $hostname ='localhost';
    $Username ='root';
    $Password ='';
    $DbName ='penulisan ilmiah';
    
    $koneksi = mysqli_connect($hostname, $Username, $Password, $DbName) or die('Gagal terhubung ke database');

    // Proses data setelah tombol Pesan diklik
    if(isset($_POST['pesan'])){
        // Mengambil nilai dari inputan
        $tanggalPembelian = $_POST['Tanggal_pembelian'];
        $namaPembeli = $_POST['Nama_pembeli'];
        $nomorPembeli = $_POST['No_pembeli'];
        $emailPembeli = $_POST['Email_pembeli'];
        $alamatPembeli = $_POST['Alamat_pembeli'];

        // Validasi inputan
        if(empty($namaPembeli) || empty($nomorPembeli) || empty($tanggalPembelian) || empty($emailPembeli) || empty($alamatPembeli)){
            echo "Mohon lengkapi semua field!";
        } else {
            // Simpan data ke dalam database
            $query = "INSERT INTO tb_pesanan (Nama_pembeli, No_pembeli, Tanggal_pembelian, Email_pembeli, Alamat_pembeli) VALUES ('$namaPembeli', '$nomorPembeli', '$tanggalPembelian', '$emailPembeli', '$alamatPembeli')";
            if(mysqli_query($koneksi, $query)){
            echo '<script>alert("Produk berhasil dipesan")</script>';
            echo '<script>window.location="index.php"</script>';
            } else{
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
            }
        }
    }
    

    // Tutup koneksi
    mysqli_close($koneksi);
    ?>

    <form method="POST" action="">
        <label for="Nama_pembeli">Nama Pembeli:</label>
        <input type="text" name="Nama_pembeli" required><br>

        <label for="No_pembeli">No Pembeli:</label>
        <input type="text" name="No_pembeli" required><br>

        <label for="Tanggal_pembelian">Tanggal Pembelian:</label>
        <input type="date" name="Tanggal_pembelian" required><br>

        <label for="Email_pembeli">Email Pembeli:</label>
        <input type="email" name="Email_pembeli" required><br>

        <label for="Alamat_pembeli">Alamat Pembeli:</label>
        <textarea name="Alamat_pembeli" required></textarea><br>

        <label for="">Metode Pembayaran:</label>
        <select class="input-control" name="Pembayaran" placeholder="Pilih Metode Pembayaran">
            <option value="">--Pilih--</option>
            <option value="">Bank BRI</option>
            <option value="">Bank Mandiri</option>
            <option value="">Bank BCA</option>
            <option value="">OVO</option>
            <option value="">Gopay</option>
            <option value="">Dana</option>
        </select>

        <input type="submit" name="pesan" value="Pesan">
    </form>
</body>
</html>