<?php
    require_once('koneksidb.php');

    if(isset($_POST['btnsimpan'])=='btnsimpan'){
        $KodeSupplier = trim($_POST['KodeSupplier']);
        $Nama = trim($_POST['Nama']);
        $Alamat = trim($_POST['Alamat']);
        $Telp = trim($_POST['Telp']);

        $query_sql = "INSERT INTO tb_supplier (KodeSupplier, Nama, Alamat, Telp)
        VALUES ('$KodeSupplier', '$Nama', '$Alamat', '$Telp');";
        $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
        if($sql){
            echo "<script> alert('Berhasil simpan .') </script>";
            echo "<script>window.location.href='supplier.php'</script>";
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
            <h2>Tambah Data Supplier</h2>

            <form method="post" name="form1">
                <div class="form-group">
                    <div class="form-group">
                        <label for="KodeSupplier">Kode Supplier :</label>
                        <input type="text" required name="KodeSupplier"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama :</label>
                        <input type="text" required name="Nama"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat :</label>
                        <input type="text" required name="Alamat"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Telp">Telp :</label>
                        <input type="text" required name="Telp"  class="form-control">
                    </div>

                    <div class="form-check mb-12">
                        <button class="btn btn-success" name="btnsimpan" value="btnsimpan" type="submit"> Simpan
                            <i class="ace-icon fa fa-signal"></i>
                        </button>
                        <button class="btn btn-danger" type="reset"> Reset
                            <i class="ace-icon fa fa-signal"></i>
                        </button>
                        <a href="supplier.php"><button class="btn btn-primary" type="button"> Data Supplier
                            <i class="ace-icon fa fa-signal"></i>
                        </button></a>
                    </div>
                </div>
            </form>

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