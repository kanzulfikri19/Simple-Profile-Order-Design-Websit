<?php
require "function.php";

session_start();
if( !isset($_SESSION['log'])){
    header('location: index.php');
    exit;
}

$id = $_GET["id"];

if( hapus($id) > 0){
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'pageinti.php';
        </script>
        ";
}else{
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'pageinti.php';
        </script>
        "; 
}
 
?>