<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Rental Mobil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="text-white">
                    <b>
                        Form Rental Mobil
                    </b>
                </h5>
            </div>

            <div class="card-body">
                <?php
                
                if (isset($_GET["id_mobil"])) {
                    # form untuk edit
                    $id_mobil = $_GET["id_mobil"];
                    $sql = "select * from mobil where id_mobil = '$id_mobil'";

                    include "connection.php";

                    # eksekusi SQL
                    $hasil = mysqli_query($connect, $sql);

                    # konversi array
                    $mobil = mysqli_fetch_array($hasil);                    
                    ?>

                    <form action="process-mobil.php" method="post" enctype="multipart/form-data"
                    onsubmit="return confirm('Apakah anda yakin ingin mengubah data ini?')">
                        ID Mobil
                       <input type="number" name="id_mobil"
                        class="form-control mb-3" required
                        value="<?=$mobil["id_mobil"]?>" readonly>

                        Merk
                       <input type="text" name="merk"
                        class="form-control mb-3" required
                        value="<?=$mobil["merk"]?>">

                        Tipe
                       <input type="text" name="tipe"
                        class="form-control mb-3" required
                        value="<?=$mobil["tipe"]?>">

                        Warma
                       <input type="text" name="warna"
                        class="form-control mb-3" required
                        value="<?=$mobil["warna"]?>">

                        Tahun Pembuatan
                       <input type="number" name="tahun_pembuatan"
                        class="form-control mb-3" required
                        value="<?=$mobil["tahun_pembuatan"]?>">

                        Biaya Sewa Per Hari
                       <input type="text" name="biaya_hari"
                        class="form-control mb-3" required
                        value="<?=$mobil["biaya_hari"]?>" >

                        Gambar Mobil
                        <br>
                        <img src="gambar_mobil/<?=$mobil["image"]?>" width="200">
                        <input type="file" name="image"
                        class="form-control mb-3" required>

                        <button type="submit" class="btn btn-success btn-block" name="update_mobil">
                            Simpan
                        </button>
                    </form>

                    <?php
                } else { 
                    # Untuk menambahkan data baru
                    ?>
                    
                    <form action="process-mobil.php" method="post" enctype="multipart/form-data">
                        ID Mobil
                       <input type="number" name="id_mobil"
                        class="form-control mb-3" required>

                        Merk
                       <input type="text" name="merk"
                        class="form-control mb-3" required>

                        Tipe
                       <input type="text" name="tipe"
                        class="form-control mb-3" required>

                        Warma
                       <input type="text" name="warna"
                        class="form-control mb-3" required>

                        Tahun Pembuatan
                       <input type="number" name="tahun_pembuatan"
                        class="form-control mb-3" required>

                        Biaya Sewa Per Hari
                       <input type="text" name="biaya_hari"
                        class="form-control mb-3" required>

                        Gambar Mobil
                       <input type="file" name="image"
                        class="form-control mb-3" required>

                        <button type="submit" class="btn btn-success btn-block" name="simpan_mobil">
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