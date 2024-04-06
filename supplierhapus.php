<?php
    require_once('koneksidb.php');

    $KodeSupplier = $_GET['id'];
    $query_sql = "DELETE FROM tb_supplier where KodeSupplier=$KodeSupplier";
    $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
    if($sql) {
        echo "<script> alert('Berhasil hapus.') </script>";
        echo "<script>window.location.href='supplier.php'</script>";
    }
?>