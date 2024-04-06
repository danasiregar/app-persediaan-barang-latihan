<?php
    require_once('koneksidb.php');

    $KodeBarangMasuk = $_GET['id'];
    $query_sql = "DELETE FROM tb_barang_masuk where KodeBarangMasuk='$KodeBarangMasuk'";
    $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
    if($sql) {
        echo "<script> alert('Berhasil hapus.') </script>";
        echo "<script>window.location.href='barangmasuk.php'</script>";
    }
?>