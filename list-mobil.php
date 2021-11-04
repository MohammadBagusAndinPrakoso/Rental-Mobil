<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil Rental</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">
                    <b>
                        List Mobil Rental
                    </b>
                </h4>
            </div>

            <div class="card-body">
                <form action="list-mobil.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-2"
                    placeholder="Masukkan Keyword Pencarian" />
                </form>

                <ul class="list-group">
                    <?php
                    
                    include "connection.php";
                    if (isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $sql = "select * from mobil where id_mobil like '%$search%' 
                        or merk like '%$search%' or jenis like '%$search%' 
                        or warna like '%$search%' or tahun_pembuatan like '%$search%'";
                    } else {
                        ?> <h4>Tidak ada data yang sesuai...</h4>

                        <?php
                        $sql = "select * from mobil";
                    }
                    
                    # Eksekusi SQL
                    $hasil = mysqli_query($connect, $sql);
                    while ($mobil = mysqli_fetch_array($hasil)) {
                        ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-4">
                                    <!-- untuk gambar -->
                                   <img src="gambar_mobil/<?=$buku["image"]?>"
                                   width="200" />
                                </div>

                                <div class="col-lg-6">
                                    <h6>Id Mobil        : <?=$mobil["id_mobil"]?></h6>
                                    <h6>Merk Mobil      : <?=$mobil["merk"]?></h6>
                                    <h6>Tipe Mobil      : <?=$mobil["jenis"]?></h6>
                                    <h6>Warna Mobil     : <?=$mobil["warna"]?></h6>
                                    <h6>Tahun Pembuatan : <?=$mobil["tahun_pembuatan"]?></h6>
                                    <h6>Biaya Sewa      : <?=$mobil["biaya_sewa_per_hari"]?></h6>
                                </div>

                                <div class="col-lg-2">
                                    <a href="form-mobil.php?id_mobil<?$mobil["id_mobil"]?>">
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