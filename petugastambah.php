<?php
    require_once('koneksidb.php');

    if(isset($_POST['btnsimpan'])=='btnsimpan'){
        $KodePetugas = trim($_POST['KodePetugas']);
        $Nama = trim($_POST['Nama']);
        $Jabatan = trim($_POST['Jabatan']);
        $Password = trim($_POST['Password']);

        $query_sql = "INSERT INTO tb_petugas (KodePetugas, Nama, Jabatan, Password)
        VALUES ('$KodePetugas', '$Nama', '$Jabatan', '$Password');";
        $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
        if($sql){
            echo "<script> alert('Berhasil simpan.') </script>";
            echo "<script>window.location.href='petugas.php'</script>";
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
            <h2>Tambah Data Petugas</h2>

            <form method="post" name="form1">
                <div class="form-group">
                    <div class="form-group">
                        <label for="KodePetugas">Kode Petugas :</label>
                        <input type="text" required name="KodePetugas"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama :</label>
                        <input type="text" required name="Nama"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Jabatan">Jabatan :</label>
                        <input type="text" required name="Jabatan"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password :</label>
                        <input type="password" required name="Password"  class="form-control">
                    </div>

                    <div class="form-check mb-12">
                        <button class="btn btn-success" name="btnsimpan" value="btnsimpan" type="submit"> Simpan
                            <i class="ace-icon fa fa-signal"></i>
                        </button>
                        <button class="btn btn-danger" type="reset"> Reset
                            <i class="ace-icon fa fa-signal"></i>
                        </button>
                        <a href="petugas.php"><button class="btn btn-primary" type="button"> Data Petugas
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