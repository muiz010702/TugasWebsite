<?php
    include 'koneksi.php';
    if(isset($_GET['ID']))
    {
        $Delete = mysqli_query($koneksi, "DELETE FROM tb_pesanan WHERE ID = '".$_GET['ID']."' ");
        echo '<script>window.location="Pesanan.php"</script>';
    }
?>