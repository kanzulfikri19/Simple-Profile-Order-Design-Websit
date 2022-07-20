<?php
//koneksi ke database
$condb = mysqli_connect("localhost", "root", "", "zicreate");

function query($query){
    global $condb;
    $result = mysqli_query($condb, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $condb;

    //ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $paket_order = htmlspecialchars($data["paket_order"]);
    $nomor_wa = htmlspecialchars($data["nomor_wa"]);
    $email = htmlspecialchars($data["email"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $keterangan = htmlspecialchars($data["keterangan"]);


    //upload gambar
    $gambar = upload();
    if( !$gambar ){
        return false;
    }

    //query insert data
    $query = "INSERT INTO client 
        VALUES
        ('', '$nama', '$paket_order', '$nomor_wa',
        '$email', '$alamat', '$gambar', '$keterangan')";
   
    mysqli_query($condb, $query);

    return mysqli_affected_rows($condb);
}

function upload(){
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar diupload
    if($error === 4){
        echo "<script>
        alert('pilih gambar terlebih dahulu');
        </script>
        ";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if(!in_array($ekstensigambar, $ekstensigambarvalid)){
        echo "<script>
        alert('yang anda upload bukan gambar');
        </script>
        ";
        return false;
    }

    //cek jika ukuran terlalu besar
    if($ukuranfile > 1000000){
        echo "<script>
        alert('ukuran gambar terlalu besar');
        </script>
        ";
        return false;
    }

    //lolos pengecekan, gambar siap diupload
    //generate nama gambar baru
    $namafilebaru = uniqid();
    $namafilebaru .= ".";
    $namafilebaru .= $ekstensigambar; 

    move_uploaded_file($tmpname, 'img/' . $namafilebaru);
    return $namafilebaru;


}

function hapus($id){
    global $condb;
    mysqli_query($condb, "DELETE FROM client WHERE id = $id");
    return mysqli_affected_rows($condb);
} 

function ubah($data){
    global $condb;

    //ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $paket_order = htmlspecialchars($data["paket_order"]);
    $nomor_wa = htmlspecialchars($data["nomor_wa"]);
    $email = htmlspecialchars($data["email"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $gambar = htmlspecialchars($data["gambar"]);
    $gambarlama = htmlspecialchars($data["gambarlama"]);
    $keterangan = htmlspecialchars($data["keterangan"]);


    //cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4){
        $gambar = $gambarlama;
    }else{
        $gambar = upload();
    }
    //query insert data
    $query = "UPDATE client SET
        nama = '$nama',
        paket_order = '$paket_order',
        nomor_wa = '$nomor_wa',
        email = '$email',
        alamat = '$alamat',
        gambar = '$gambar',
        keterangan = '$keterangan'
        WHERE id = $id
        ";

    mysqli_query($condb, $query);

    return mysqli_affected_rows($condb);

}

function registrasi($data){
    global $condb;


    $username = strtolower(stripslashes($data["username"]));
    $name = $data["name"];
    $email = $data["email"];
    $password = mysqli_real_escape_string($condb,$data["pass"]);
    $cpassword = mysqli_real_escape_string($condb,$data["cpass"]);


    //cek username
    $result = mysqli_query($condb, "SELECT username FROM user WHERE username ='$username'");
    if(mysqli_fetch_assoc($result)){
        echo "
        <script>
            alert('Username sudah terdaftar!');
        </script>
        ";
        return false;
    }
    //cek konfirmasi passowrd
    if($password !== $cpassword){
        echo "
        <script>
            alert('Konfirmasi password tidak sesuai!');
        </script>
        ";
        return false;
    }
    //enkripsi
    //tambah user ke database
    mysqli_query($condb, "INSERT INTO user VALUES('$username', '$password', '$name', '$email')");
    return mysqli_affected_rows($condb);
}
?>