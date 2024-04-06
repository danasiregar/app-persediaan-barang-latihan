<?php
    require_once('koneksidb.php');

    $KodeBarang = $_GET['id'];
    $query_sql = "DELETE FROM tb_barang where KodeBarang='$KodeBarang'";
    $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
    if($sql) {
        echo "<script> alert('Berhasil hapus.') </script>";
        echo "<script>window.location.href='barang.php'</script>";
    }
?>