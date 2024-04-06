<?php
    require_once('koneksidb.php');

    if(isset($_POST['btnsimpan'])=='btnsimpan'){
        $KodeBarangMasuk = trim($_POST['KodeBarangMasuk']);
        $Nama = trim($_POST['Nama']);
        $Tanggal = trim($_POST['Tanggal']);
        $KodeSupplier = trim($_POST['KodeSupplier']);
        $KodeBarang = trim($_POST['KodeBarang']);
        $Jumlah = trim($_POST['Jumlah']);
        $Satuan = trim($_POST['Satuan']);
        $Petugas = 'ADMIN';

        $query_sql = "UPDATE tb_barang_masuk SET Nama='$Nama', Tanggal='$Tanggal', KodeSupplier='$KodeSupplier', KodeBarang='$KodeBarang',
        Jumlah='$Jumlah', Satuan='$Satuan', Petugas='$Petugas'
                WHERE KodeBarangMasuk='$KodeBarangMasuk'";
        $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
        if($sql){
            echo "<script> alert('Berhasil simpan.') </script>";
            echo "<script>window.location.href='barangmasuk.php'</script>";
        }
    }

    $KodeBarangMasuk = $_GET['id'];
    $query_sql = "SELECT * FROM tb_barang_masuk where KodeBarangMasuk='$KodeBarangMasuk' ";
    $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
    $totaldata = mysqli_num_rows($sql);
    $data = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta rel="icon" href="docs/4.0/assets/img/favicons/favicon.ico">

        <title>Aplikasi PHP MySQL</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-static/">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

        <!-- Custom styles for this template -->
        <link href="navbar-top.css" rel="stylesheet">
      
    </head>
    <body>
        <?php require_once('menu.php'); ?>
        <br>
        <div class="container">
            <h2>Edit Data Barang Masuk</h2>

            <div class="col-lg-12">
            <form method="post" name="form1">
                <div class="card">
                    <div class="card-header">
                        Ubah data barang masuk
                    </div>
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="KodeBarangMasuk">Kode Barang Masuk :</label>
                                    <input type="text" disabled required name="KodeBarangMasuk" value="<?php echo $data['KodeBarangMasuk']; ?>"
                                    class="form-control">
                                    <input type="hidden" required name="KodeBarangMasuk" value="<?php echo $data['KodeBarangMasuk']; ?>"
                                    class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Nama">Nama :</label>
                                    <input type="text" required name="Nama" value="<?php echo $data['Nama']; ?>"
                                    class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Tanggal">Tanggal :</label>
                                    <input type="date" required name="Tanggal" value="<?php echo  date ('Y-m-d', strtotime(trim($data['Tanggal']))); ?>"
                                    class="form-control">
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <label for="KodeSupplier">Kode Supplier :</label>
                                <select class="form-control" name="KodeSupplier">

                                    <?php
                                        $query_Rs_Qr_Sp = "select * from tb_supplier order by KodeSupplier ASC";
                                        $Rs_Qr_Sp = mysqli_query($koneksidb, $query_Rs_Qr_Sp) or die(mysqli_error($koneksidb));
                                        $n=0;
                                        while($dataTemp=mysqli_fetch_array($Rs_Qr_Sp)) {
                                    ?>
                                        <option value="<?php echo $dataTemp['KodeSupplier']; ?>" <?php echo $data['KodeSupplier'] == $dataTemp['KodeSupplier'] ? 'selected': '' ?>><?php echo $dataTemp['KodeSupplier']; ?></option>
                                    <?php
                                        $n++;
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col col-md-6">
                            <div class="form-group">
                                <label for="KodeBarang">Kode Barang :</label>
                                <select class="form-control" name="KodeBarang">

                                    <?php
                                        $query_Rs_Qr_Sp = "select * from tb_barang order by KodeBarang ASC";
                                        $Rs_Qr_Sp = mysqli_query($koneksidb, $query_Rs_Qr_Sp) or die(mysqli_error($koneksidb));
                                        $n=0;
                                        while($dataBarang=mysqli_fetch_array($Rs_Qr_Sp)) {
                                    ?>
                                        <option value="<?php echo $dataBarang['KodeBarang']; ?>" <?php echo $data['KodeBarang'] == $dataBarang['KodeBarang'] ? 'selected': '' ?>><?php echo $dataBarang['KodeBarang']; ?></option>
                                    <?php
                                        $n++;
                                        }
                                    ?>
                                </select>
                            </div>
                                <div class="form-group">
                                    <label for="Jumlah">Jumlah :</label>
                                    <input type="number" required name="Jumlah" value="<?php echo $data['Jumlah']; ?>"
                                    class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Satuan">Satuan :</label>
                                    <select class="form-control" name="Satuan">
                                        <option value="PCS" <?php echo $data['Satuan'] == 'PCS' ? 'selected': ''; ?>>PCS</option>
                                        <option value="KG" <?php echo $data['Satuan'] == 'KG' ? 'selected': '' ?>>KG</option>
                                        <option value="BAL" <?php echo $data['Satuan'] == 'BAL' ? 'selected': '' ?>>BAL</option>
                                        <option value="DUS" <?php echo $data['Satuan'] == 'DUS' ? 'selected': '' ?>>DUS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                <button class="btn btn-success" name="btnsimpan" value="btnsimpan" type="submit"> Simpan
                    <i class="ace-icon fa fa-signal"></i>
                </button>
                <button class="btn btn-danger" type="reset"> Reset
                    <i class="ace-icon fa fa-signal"></i>
                </button>
                <a href="barangmasuk.php"><button class="btn btn-primary" type="button"> Data Barang Masuk
                    <i class="ace-icon fa fa-signal"></i>
                </button></a>
            </div>
        </div>
    </form>
    </div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="xampp/htdocs/persediaan/bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>