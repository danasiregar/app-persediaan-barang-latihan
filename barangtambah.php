<?php
    require_once('koneksidb.php');

    if(isset($_POST['btnsimpan'])=='btnsimpan'){
        $KodeBarang = trim($_POST['KodeBarang']);
        $Nama = trim($_POST['Nama']);
        $KodeSupplier = trim($_POST['KodeSupplier']);
        $Jenis = trim($_POST['Jenis']);
        $HargaBeli = trim($_POST['HargaBeli']);
        $HargaJual = trim($_POST['HargaJual']);
        $Stok = trim($_POST['Stok']);
        $Satuan = trim($_POST['Satuan']);
        $Petugas = 'ADMIN';

        $query_sql = "select * from tb_barang where KodeBarang='$KodeBarang' ";
        $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
        $totaldata = mysqli_num_rows($sql);
        if($totaldata <> 0) {
            echo "<script> alert('Data barang sudah pernah ada.') </script>";
            echo "<script>window.location.href='barangtambah.php'</script>";
        }else{
            $query_sql = "INSERT INTO tb_barang (KodeBarang, Nama, KodeSupplier, Jenis, HargaBeli, HargaJual, Stok,
            Satuan, Petugas)
            VALUES ('$KodeBarang', '$Nama', '$KodeSupplier', '$Jenis', $HargaBeli, $HargaJual, $Stok, '$Satuan',
            '$Petugas');";
            $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb)); 
            
            if($sql){
                echo "<script> alert('Berhasil simpan.') </script>";
                echo "<script>window.location.href='barang.php'</script>";
            }
        }
    }
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
            <h2>Tambah Data Barang</h2>

            <div class="col-lg-12">
            <form method="post" name="form1">
                <div class="card">
                    <div class="card-header">
                        Isikan data barang
                    </div>
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="KodeBarang">Kode Barang :</label>
                                    <input type="text" required name="KodeBarang" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Nama">Nama :</label>
                                    <input type="text" required name="Nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="HargaBeli">Harga Beli :</label>
                                    <input type="text" required name="HargaBeli" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="HargaJual">Harga Jual :</label>
                                    <input type="text" required name="HargaJual" class="form-control">
                                </div>
                            </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="KodeSupplier">Kode Supplier :</label>
                                <select class="form-control" name="KodeSupplier">

                                    <?php
                                        $query_Rs_Qr_Sp = "select * from tb_supplier order by KodeSupplier ASC";
                                        $Rs_Qr_Sp = mysqli_query($koneksidb, $query_Rs_Qr_Sp) or die(mysqli_error($koneksidb));
                                        $n=0;
                                        while($data=mysqli_fetch_array($Rs_Qr_Sp)) {
                                    ?>
                                        <option value="<?php echo $data['KodeSupplier']; ?>"><?php echo $data['KodeSupplier']; ?></option>
                                    <?php
                                        $n++;
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Jenis">Jenis :</label>
                                <input type="text" required name="Jenis" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Stok">Stok :</label>
                                <input type="text" required name="Stok" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Satuan">Satuan :</label>
                                <select class="form-control" name="Satuan">
                                    <option value="PCS">PCS</option>
                                    <option value="KG">KG</option>
                                    <option value="BAL">BAL</option>
                                    <option value="DUS">DUS</option>
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
                <a href="barang.php"><button class="btn btn-primary" type="button"> Data Barang
                    <i class="ace-icon fa fa-signal"></i>
                </button></a>
            </div>
        </div>
    </form>
    </div>
</div>
<br>
<br>
<br>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="xampp/htdocs/persediaan/bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>