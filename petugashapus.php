<?php
    require_once('koneksidb.php');

    $KodePetugas = $_GET['id'];
    $query_sql = "DELETE FROM tb_petugas where KodePetugas=$KodePetugas";
    $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
    if($sql) {
        echo "<script> alert('Berhasil hapus.') </script>";
        echo "<script>window.location.href='petugas.php'</script>";
    }
?>