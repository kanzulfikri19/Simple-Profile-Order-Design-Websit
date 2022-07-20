<?php
require "function.php";

session_start();
if( !isset($_SESSION['log'])){
    header('location: index.php');
    exit;
}
//ambil data i URL
$id = $_GET["id"];
//  query data mahasiswa berdasarkan id
$clie = query("SELECT * FROM client WHERE id = $id")[0];


//cek apakah tombol submit sudah dipencet 

if( isset($_POST["submit"]) ) {

    if( ubah($_POST) > 0){
        echo "
        <script>
            alert('Data berhasil diubah!');
            document.location.href = 'pageinti.php';
        </script>
        ";

    }else{
        echo "
        <script>
        alert('Data gagal diubah!');
        document.location.href = 'pageinti.php';
        </script>
        ";
    }



}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update data client</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>UPDATE DATA CLIENT</h1>

    <form action="" method="post" enctype="multipart/form-data"  class="form-group tengah">
        <input type="hidden" name="id" value="<?php echo $clie["id"]; ?>" >
        <input type="hidden" name="gambarlama" value="<?php echo $clie["gambar"]; ?>" >

        <ul>
            <li style='list-style-type: none;'>
                <label for="nama">Nama</label><br>
                <input type="text" name="nama" id="nama" required value="<?php echo $clie["nama"]; ?>">
            </li>
            <li style='list-style-type: none;'>
                <label for="paket_order">Paket order</label><br>
                <input type="text" name="paket_order" id="paket_order" required value="<?php echo $clie["paket_order"]; ?>">
            </li>
            <li style='list-style-type: none;'>
                <label for="nomor_wa">No. wa</label><br>
                <input type="text" name="nomor_wa" id="nomor_wa" required value="<?php echo $clie["nomor_wa"]; ?>">
            </li>
            <li style='list-style-type: none;'>
                <label for="email">Email</label><br>
                <input type="text" name="email" id="email" required value="<?php echo $clie["email"]; ?>">
            </li>
            <li style='list-style-type: none;'>
                <label for="alamat">Alamat</label><br>
                <input type="text" name="alamat" id="alamat" required value="<?php echo $clie["alamat"]; ?>">
            </li>
            <li style='list-style-type: none;'>
                <label for="gambar">Gambar</label><br>
                <img src="img/<?php echo $clie['gambar']; ?>" width="40px" alt=""><br>
                <input type="file"  name="gambar" id="gambar"  >
            </li>
            <li style='list-style-type: none;'>
                <label for="keterangan">Keterangan</label><br>
                <input type="text" name="keterangan" id="keterangan" required value="<?php echo $clie["keterangan"]; ?>">
            </li>
            <li style='list-style-type: none;'>
            <button  style="color: white; background-color: #4CAF50; font-size: 12px; border-radius: 8px; padding: 8px 22px;" type="submit" name="submit">Update Data!</button>
            <a style="color: white; background-color: #008CBA; font-size: 12px; border-radius: 8px; padding: 8px 22px; display: inline-block;" href="pageinti.php" class="previous">Kembali</a>
            </li>
        </ul>
    
    </form>



</body>
</html> 