<?php
    require_once('koneksidb.php');

    $KodePelanggan = $_GET['id'];
    $query_sql = "DELETE FROM tb_pelanggan where KodePelanggan=$KodePelanggan";
    $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
    if($sql) {
        echo "<script> alert('Berhasil hapus.') </script>";
        echo "<script>window.location.href='pelanggan.php'</script>";
    }
?>