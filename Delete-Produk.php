<?php
include 'koneksi.php';

if(isset($_GET['idk']))
{
    $Delete = mysqli_query($koneksi, "DELETE FROM tb_kategori WHERE Id_kategori = '".$_GET['idk']."' ");
    echo '<script>window.location="Kategori.php"</script>';
}

if(isset($_GET['idp']))
{
    $produk = mysqli_query($koneksi, "SELECT Gambar_produk FROM tb_produk WHERE ID_produk ='".$_GET['idp']."' ");
    $P =mysqli_fetch_object($produk);

    unlink('./Produk/'.$P->Gambar_produk);

    $Delete = mysqli_query($koneksi, "DELETE FROM tb_produk WHERE ID_produk = '".$_GET['idp']."' ");
    echo '<script>window.location="Produk.php"</script>';
}


?>