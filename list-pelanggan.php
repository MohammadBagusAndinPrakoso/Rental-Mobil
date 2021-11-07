<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar List Pelanggan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">
                    <b>
                        Daftar List Member
                    </b>
                </h4>
            </div>

            <div class="card-body">
                <form action="list-member" method="get">
                    <input type="text" name="search" class="form-cntrol mb-3"
                    placeholder="Masukkan Keywoard..." required>
                </form>

                <ul class="list-group">
                    <?php
                    
                    include "connection.php";
                    if (isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $sql = "select * from pelanggan where id_pelanggan like '%$search%' or nama_pelanggan like '%$search%'
                        or kontak like '%$search%'";
                    } else {
                        ?>
                        <h5>Tidak ada data yang sesuai...</h5>
                        
                        <?php
                        $sql = "select * from pelanggan";
                    }
                    
                    $query = mysqli_query($connect, $sql);
                    while ($anggota = mysqli_fetch_array($query)) {
                        ?>
                        <li class="list-group-item">
                            <div class=row>
                                <div class="col-lg-8 col-md-10">
                                    <h6>ID Pelanggan     : <?=$pelanggan["id_pelanggan"]?></h6>
                                    <h6>Nama Pelanggan   : <?=$pelanggan["nama_pelanggan"]?></h6>
                                    <h6>Alamat           : <?=$pelanggan["alamat"]?></h6>
                                    <h6>Kontak           : <?=$pelanggan["kontak"]?></h6>
                                </div>

                                <div class="col-lg-2">
                                    <a href="form-pelanggan.php?id_pelanggan<?$pelanggan["id_pelanggan"]?>">
                                        <button class="btn btn-success btn-block">
                                            Edit
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </li>
                    <?php
                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>