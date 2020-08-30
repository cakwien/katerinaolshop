<?php

class induk
{
    function login($con,$username,$password)
    {
        $q=mysqli_query($con,"Select * from user where username = '$username' and password = '$password'");
        $cek=mysqli_fetch_array($q);
        if (!empty($cek[0]))
        {
            session_start();
            $_SESSION['username'] = $username;
            header('Location:?p=main');
        }
        else 
        {
            echo '<script>window.alert("USERNAME DAN PASSWORD SALAH, ULANGI KEMBALI");window.location.href="?p=login"</script>';
        }
    }
    
    function useraktif($con,$username)
    {
        $q=mysqli_query($con,"select * from user where username = '$username'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
}

?>