<?php
require "function.php";


session_start();
if( !isset($_SESSION['log'])){
    header('location: index.php');
    exit;
}

$client = query("SELECT * FROM client")

?>


<!DOCTYPE html>
<html>
<head>
    <title>ADMIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<h1 >DAFTAR CLIENT ZICREATE</h1>

<a style="color: white; background-color: #4CAF50; font-size: 12px; border-radius: 8px; padding: 8px 22px; margin-left: 200px; margin-top: 500px;" href="tambah.php">Tambah data client</a>
<a style="color: white; background-color: red; font-size: 12px; border-radius: 8px; padding: 8px 22px;" href="logout.php" onclick="return confirm('yakin ingin logout?')">Logout</a>
<br><br>

<div class="table-responsive">
    
        <table class="table table-hover" style="width: 75%; overflow-x:auto;" align=center>
            <thead class="text-center">
                <tr style = "color: white;" >
                    <th class="text-center">No.</th>
                    <th class="text-center">Aksi</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Paket</th>
                    <th class="text-center">Nomor Whatsapp</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Keterangan</th>

                </tr>
                <?php $i = 1; ?>
                <?php foreach( $client as $row): ?>
                <tr style = "color: white;">
                    <td><?php echo $i ?></td>
                    <td align=center>
                    <a style="color: white; background-color: #4CAF50; font-size: 12px; border-radius: 8px; padding: 8px 22px; display: inline-block;" href="ubah.php?id=<?php echo $row["id"]; ?>">update</a>
                    <a style="color: white; background-color: #008CBA; font-size: 12px; border-radius: 8px; padding: 8px 22px; display: inline-block; margin-top: 10px; " href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?');">delete</a>
                    </td>

                    <td><img src="img/<?php echo $row["gambar"]; ?>" alt="" width=50px ></td>
                    <td><?php echo $row["nama"]; ?></td>
                    <td><?php echo $row["paket_order"]; ?></td>
                    <td><?php echo $row["nomor_wa"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["alamat"]; ?></td>
                    <td><?php echo $row["keterangan"]; ?></td>

                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>

</body>
</html>