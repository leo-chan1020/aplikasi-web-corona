<?php
session_start();
include '../koneksi.php';

if(isset($_POST['btnlogin']))
{
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    $sql = "SELECT Id_petugas, Nama_petugas FROM petugas 
            WHERE Username='$username' AND Password='$password'";
    $res = mysqli_query($koneksi, $sql);

    $count = mysqli_affected_rows($koneksi);

    if($count == 1)
    {
        $data_login = mysqli_fetch_assoc($res);
        
        $_SESSION['Nama_petugas'] = $data_login['nama']; 
        //nilainya bisa digunakan di navbar, mis. 'Hai, [Nama_petugas]'

        header("Location: http://localhost/covid/index.php");
    }
    else
    {   
        header("Location: http://localhost/covid/index.php");
    }
}
?>