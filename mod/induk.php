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
            $_SESSION['login'] = TRUE;
            $time=time();
            setcookie('login',$username,$time + 3600);
            header('Location:?p=main');
        }
        else 
        {
            echo '<script>window.alert("USERNAME DAN PASSWORD SALAH, ULANGI KEMBALI");window.location.href="?p=login"</script>';
        }
    }
    
    function useraktif($con,$username)
    {
        $q=mysqli_query($con,"select nm_user from user where username = '$username'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }

    function simpan($con,$nm_user,$username,$password,$tipe)
    {
        $q=mysqli_query($con,"insert into user value('','$nm_user','$username','$password','$tipe')");
        if ($q)
        {
            $pesan = "User ".$nm_user." Berhasil ditambahkan...";
            header('location:?p=profil&ps='.rhs($pesan));
        }else
        {
            $pesan = "User".$nm_user."gagal ditambahkan...";
            header('location:?p=profil&pse='.rhs($pesan));
        }
    }

    function tampil($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from user");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
    }

    function level($con,$username)
    {
        $q=mysqli_query($con,"select level from user where username ='$username'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }

    function user_hapus($con,$id_user)
    {
        $q=mysqli_query($con,"delete from user where id_user = '$id_user'");
        if ($q)
        {
            $pesan = "User Berhasil Dihapus...";
            header('location:?p=profil&ps='.rhs($pesan));
        }
        else
        {
            $pesan = "User Gagal Dihapus...";
            header('location:?p=profil&pse='.rhs($pesan));
        }
    }

    function user_show($con,$id_user)
    {
        $q=mysqli_query($con,"select * from user where id_user = '$id_user'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }

    function update($con,$nm_user,$username,$password,$level,$id_user)
    {
        $q=mysqli_query($con,"update user set nm_user = '$nm_user', username='$username', password='$password', level = '$level' where id_user = '$id_user'");
        if ($q)
        {
            $pesan = "User berhasil di update";
            header('location:?p=profil&ps='.rhs($pesan));
        }else
        {
            $pesan = "User gagal di update";
            header('locaction:?p=profil&pse='.rhs($pesan));
        }
    }

    
}

?>