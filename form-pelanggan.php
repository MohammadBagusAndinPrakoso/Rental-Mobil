<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pelanggan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white">
                    <b>
                        Form Pelanggan
                    </b>
                </h4>
            </div>

            <div class="card-body">
                <?php
                
                if (isset($_GET["id_pelanggan"])) {
                    include "connection.php";
                    $id_pelanggan = $_GET["id_pelanggan"];
                    $sql = "select * from pelanggan where id_pelanggan = '$id_pelanggan'";

                    $hasil = mysqli_query($connect, $sql);
                    ?>

                    <form action="process-pelanggan.php" method="post" 
                    onsubmit="return confirm('Apakah anda yakin ingin mengubah data ini?')">
                        ID Pelanggan
                        <input type="number" name="id_pelanggan" 
                        class="form-control mb-3" required
                        value="<?=$pelanggan["id_pelanggan"]?>" readonly>

                        Nama Pelanggan
                        <input type="text" name="nama_pelanggan" 
                        class="form-control mb-3" required
                        value="<?=$pelanggan["nama_pelanggan"]?>" required>

                        Alamat
                        <input type="text" name="alamat" 
                        class="form-control mb-3" required
                        value="<?=$pelanggan["alamat"]?>" required>

                        Kontak
                        <input type="text" name="kontak" 
                        class="form-control mb-3" required
                        value="<?=$pelanggan["kontak"]?>" required>
                    </form>
                <?php
                } else {
                    // Untuk Tambah Data
                    ?>

                    <form action="process-pelanggan.php" method="post" enctype="multipart/form-data">
                        ID Pelanggan
                        <input type="number" name="id_pelanggan" 
                        class="form-control mb-3" required>

                        Nama Pelanggan
                        <input type="text" name="nama_pelanggan" 
                        class="form-control mb-3" required>

                        Alamat
                        <input type="text" name="alamat" 
                        class="form-control mb-3" required>

                        Kontak
                        <input type="text" name="kontak" 
                        class="form-control mb-3" required>

                        <button type="submit" class="btn btn-success btn-block" name="simpan_pelanggan">
                            Simpan
                        </button>
                    </form>

                    <?php
                }

                ?>
            </div>
        </div>
    </div>
</body>
</html>