<?php

//koneksi ke database
$condb = mysqli_connect("localhost", "root", "", "zicreate");

//ambil data dari tabel mahasiswa/query
$result = mysqli_query($condb, "SELECT * FROM client");

if( !$result ){
    echo mysqli_error($condb);
}

//ambil data(fetch) mahasiswa dari object result
//mysqli_fetch_row() //mengembalikan array numerik (array nomor)
//mysqli_fetch_assoc() //mengembalikan array asosiatif (nama)
//mysqli_fetch_array() //angka atau string
//mysqli_fetch_object()

// while ( $cli = mysqli_fetch_assoc($result) ){ 
// var_dump($cli);
// }

?>


<!DOCTYPE html>
<html>
<head>
    <title>190441100098 | CRUD</title>
</head>
<body>

<h1>Daftar client</h1>

<table border="1" cellpadding="10" cellspacing="0">

<tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Paket</th>
    <th>Nomor Whatsapp</th>
    <th>Email</th>
    <th>Alamat</th>
</tr>
<?php $i = 1; ?>
<?php while( $row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?php echo $i ?></td>
    <td>
    <a href="">update</a>   |
    <a href="">delete</a>
    </td>

    <td><img src="img/<?php echo $row["gambar"] ?>" alt="" width=50px ></td>
    <td><?php echo $row["nama"] ?></td>
    <td><?php echo $row["paket_order"] ?></td>
    <td><?php echo $row["nomor_wa"] ?></td>
    <td><?php echo $row["email"] ?></td>
    <td><?php echo $row["alamat"] ?></td>
</tr>
<?php $i++; ?>
<?php endwhile; ?>

</body>
</html>