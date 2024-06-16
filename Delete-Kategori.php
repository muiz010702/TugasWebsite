<?php
    include 'koneksi.php';
    if(isset($_GET['idk']))
    {
        $Delete = mysqli_query($koneksi, "DELETE FROM tb_kategori WHERE Id_kategori = '".$_GET['idk']."' ");
        echo '<script>window.location="Kategori.php"</script>';
    }
?>