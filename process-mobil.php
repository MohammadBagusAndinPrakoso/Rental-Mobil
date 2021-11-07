<?php

include "connection.php";
if (isset($_POST["simpan_mobil"])) {
    # menampung data yg dikirim
    $id_mobil = $_POST["id_mobil"];
    $merk = $_POST["merk"];
    $tipe = $_POST["tipe"];
    $warna = $_POST["warna"];
    $tahun_pembuatan = $_POST["tahun_pembuatan"];
    $biaya_hari = $_POST["biaya_hari"];

    # manage upload file (image mobil)
    $fileName = $_FILES["cover"]["name"];
    $extension = pathinfo($_FILES["gambar_mobil"]["name"]);
    $ext = $extension["extension"];
    $image = time()."-".$fileName;

    #proses upload
    $folderName = "gambar_mobil/$gambar_mobil";
    if (move_uploaded_file($_FILES["gambar_mobil"]["tmp_name"],$folderName)) {
        # proses insert data ke tabel mobil rental
        $sql = "insert into mobil values ('$id_mobil','$merk','$tipe','$warna',
        '$tahun_pembuatan','$biaya_hari','$image')";

        # eksekusi perintah $sql
        mysqli_query($connect,$sql);
        echo "Tambah Data Mobil Rental Berhasil...";

        # direct/menuju halaman/web list mobil rental
        header("location:list-mobil.php");
    } else {
        echo "Upload File Gagal...";
    }
} elseif (isset($_POST["update_mobil"])) {
    # menampung data yg dikirim
    $id_mobil = $_POST["id_mobil"];
    $merk = $_POST["merk"];
    $tipe = $_POST["tipe"];
    $warna = $_POST["warna"];
    $tahun_pembuatan = $_POST["id_mobil"];
    $biaya_hari = $_POST["biaya_hari"];

    # jika update data beserta gambar
    if (!empty($_FILES["gambar_mobil"]["name"])) {
        # ambil data nama file yg akan di hapus
        $sql = "select * from mobil where id_mobil='$id_mobil'";
        $hasil = mysqli_query($connect, $sql);
        $mobil = mysqli_fetch_array($hasil);
        $oldFileName = $mobil["image"];

        # membuat path file yg lama
        $path = "cover/$oldFileName";

        # cek eksistensi file yg lama
        if (file_exists($path)) {
            # hapus file yg lama
            unlink($path);
        }

        # membuat file name baru
        $image = time()."-".$_FILES["gambar_mobil"]["name"];
        $folder = "gambar_mobil/$image";
        
        # proses upload file yg baru
        if (move_uploaded_file($_FILES["gambar_mobil"]["tmp_name"], $folder)) {
            $sql = "update buku set s='$judul_buku',
            penulis='$penulis',penerbit='$penerbit',
            jumlah_halaman='$jumlah_halaman',genre='$genre',
            cover='$cover'
            where isbn='$isbn'";
            
            if (mysqli_query($connect, $sql)) {
                # jika update berhasil
                header("location:list-buku.php");
            } else {
                # jika update gagal
                echo mysqli_error($connect);
            }
            
        }
    }

    # jika update data saja
    else {
        $sql = "update buku set judul_buku='$judul_buku',
            penulis='$penulis',penerbit='$penerbit',
            jumlah_halaman='$jumlah_halaman',genre='$genre'
            where isbn='$isbn'";
            
            if (mysqli_query($connect, $sql)) {
                # jika update berhasil
                header("location:list-buku.php");
            } else {
                # jika update gagal
                echo mysqli_error($connect);
            }
    }# proses upload file yg baru
        if (move_uploaded_file($_FILES["cover"]["tmp_name"], $folder)) {
            $sql = "update buku set judul_buku='$judul_buku',
            penulis='$penulis',penerbit='$penerbit',
            jumlah_halaman='$jumlah_halaman',genre='$genre',
            cover='$cover'
            where isbn='$isbn'";
            
            if (mysqli_query($connect, $sql)) {
                # jika update berhasil
                header("location:list-buku.php");
            } else {
                # jika update gagal
                echo mysqli_error($connect);
            }
            
        }
    }

    # jika update data saja
    else {
        $sql = "update buku set judul_buku='$judul_buku',
            penulis='$penulis',penerbit='$penerbit',
            jumlah_halaman='$jumlah_halaman',genre='$genre'
            where isbn='$isbn'";
            
            if (mysqli_query($connect, $sql)) {
                # jika update berhasil
                header("location:list-buku.php");
            } else {
                # jika update gagal
                echo mysqli_error($connect);
            }
    }


?>