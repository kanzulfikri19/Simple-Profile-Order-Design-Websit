<?php
require "function.php";

session_start();
if( !isset($_SESSION['log'])){
    header('location: index.php');
    exit;
}

//cek apakah tombol submit sudah dipencet 

if( isset($_POST["submit"]) ) {

    if( tambah($_POST) > 0){
        echo "
        <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'pageinti.php';
        </script>
        ";

    }else{
        echo "
        <script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'pageinti.php';
        </script>
        ";
    }



}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Tambah data client</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
<h1 >TAMBAH DATA CLIENT</h1>

    <form action="" method="post" enctype="multipart/form-data"  class="form-group tengah">
        <ul >
            <li style='list-style-type: none;'>
                <label for="nama">Nama</label><br>
                <input type="text" name="nama" placeholder="Masukkan nama" id="nama" required >
            </li>
            <li style='list-style-type: none;'>
                <label for="paket_order">Paket order</label><br>
                <input type="text" name="paket_order" id="paket_order" placeholder="Masukkan paket order" required>
            </li>
            <li style='list-style-type: none;'>
                <label for="nomor_wa">No. wa : </label><br>
                <input type="text" name="nomor_wa" id="nomor_wa" placeholder="Masukkan nomor wa" required>
            </li>
            <li style='list-style-type: none;'>
                <label for="email">Email : </label><br>
                <input type="text" name="email" id="email" placeholder="Masukkan email" required>
            </li>
            <li style='list-style-type: none;'>
                <label for="alamat">Alamat : </label><br>
                <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat" required>
            </li>
            <li style='list-style-type: none; '>
                <label for="gambar">Gambar : </label><br>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li style='list-style-type: none;'>
                <label for="keterangan">Keterangan : </label><br>
                <input type="text" name="keterangan" id="keterangan" placeholder="Masukkan keterangan" required>
            </li>
            <li style='list-style-type: none;'>
            <button style="color: white; background-color: #4CAF50; font-size: 12px; border-radius: 8px; padding: 8px 22px;" type="submit" name="submit">Tambah Data!</button>
            <a style="color: white; background-color: #008CBA; font-size: 12px; border-radius: 8px; padding: 8px 22px; display: inline-block;" href="pageinti.php" class="previous">Kembali</a>
            </li>
        </ul>
    </form>


</body>
</html> 