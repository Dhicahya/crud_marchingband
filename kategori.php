<?php
include('koneksi.php');
$db = new database();
$data_kategori = $db->tampil_kategori();
$koneksi = new database();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Inventaris | Marching Band</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
     <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #d13d2a;">
        <!-- Brand -->
        <a class="navbar-brand" href="index.html">MB PBH</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="barang.php">Alat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="kategori.php">Kategori</a>
                </li>
            </ul>
        </div>
    </nav>
    <div>
        <h1 style="text-align: center;">
            KATEGORI ALAT
        </h1>
    </div>
    <!-- Progress Table start -->
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-body">
                <?php
                if (isset($_GET['pesan'])) {
                    $munculpesan = $_GET['pesan'];
                    echo "<div class='alert alert-success'> $munculpesan </div>";
                }
                if (isset($_GET['pesen'])) {
                    $munculpesan = $_GET['pesen'];
                    echo "<div class='alert alert-alert'> $munculpesan </div>";
                }
                ?>
                <!-- Button to Open the Modal -->
                <div class="text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        [+] Kategori
                    </button>
                </div>
                <div>

                </div>
            </div>
            <div class="table table-striped">

                <div class="table-responsive">
                    <table>
                        <td>Pencarian</td>
                        <td style="width: 100%;"><input class="form-control" id="myInput" type="text" placeholder="Search.."></td>
                    </table>
                    <table class="table table-hover progress-table text-center" id="dtable">
                        <thead class="text-uppercase">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>action</th>
                            </tr>
                        </thead>

                        <tbody id="myTable">
                            <?php
                            $no = 1;
                            foreach ($data_kategori as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row["nama_kategori"]; ?></td>
                                    <td>
                                        <a href="" class="text-secondary" data-toggle="modal" data-target="#myModalEdit<?php echo $row['id_kategori']; ?>">
                                            <p class="fa fa-edit" style="font-size:25px"></p>
                                        </a>
                                        <a href="" class="text-danger" data-toggle="modal" data-target="#myModalHapus<?php echo $row['id_kategori']; ?>">
                                            <p class="fa fa-trash" style="font-size:24px"></p>
                                        </a>
                                    </td>
                                </tr>
                                <!-- main content area end -->



                                <!-- The Modal -->
                                <div class="modal" id="myModalEdit<?php echo $row['id_kategori']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Data kategori</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="POST" action="kategori.php">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_kategori" value="<?php echo $row['id_kategori']; ?>">

                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Kategori</label>
                                                            <input type="text" class="form-control" name="nama_kategori" value="<?php echo $row['nama_kategori']; ?>" placeholder="Masukkan Nama Kategori">
                                                        </div>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success" name="update">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- awal modal hapus -->
                                <div class="modal fade " id="myModalHapus<?php echo $row['id_kategori']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Menghapus Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="kategori.php">
                                                <input type="hidden" name="id_kategori" value="<?= $row['id_kategori'] ?>">

                                                <div class="modal-body">

                                                    <h5 class="text-center">Apakah anda ingin menghapus data ini ?
                                                        <br><span class="text-danger"><?= $row['nama_kategori'] ?></span>
                                                    </h5>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- akhirmodal hapus -->
                                
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Input Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="kategori.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" placeholder="Input Nama Kategori" required>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <?php

    if (isset($_POST['simpan'])) {

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas

        $hasil = $koneksi->tambah_kategori($_POST['nama_kategori']);
        if ($hasil) {
            echo "<script>window.location.href='kategori.php';</script>";
        } else {
            echo "<script>window.location.href='kategori.php';</script>";
        }
    }

    if (isset($_POST['update'])) {
        $koneksi->update_kategori($_POST['id_kategori'], $_POST['nama_kategori']);
        if ($hasil) {
            echo "<script>window.location.href='kategori.php';</script>";
        } else {
            echo "<script>window.location.href='kategori.php';</script>";
        }
    }

    if (isset($_POST['hapus'])) {
        $hapus = $koneksi->delete_kategori($_POST['id_kategori']);
        if ($hapus) {
            echo "<script>window.location.href='kategori.php';</script>";
        } else {
            echo "<script>window.location.href='kategori.php';</script>";
        }
    }

    ?>


    <!-- footer area start-->
    <footer class="fixed-bottom" style="position: fixed;height: 30px;bottom: 0;width: 100%; background-color: black;">

        <p style="color: white; text-align: center; ">Marching Band Universitas Muhammadiyah Cirebon</p>
    </footer>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>