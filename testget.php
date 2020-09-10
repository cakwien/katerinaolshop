<?php
$con = mysqli_connect("localhost","root","","katerina_olshop");

if (!empty($_GET['kd_barang']))
{
    $kd_barang = $_GET['kd_barang'];
    $q=mysqli_query($con,"select nm_barang from barang where kd_barang = '$kd_barang'");
    $dt=mysqli_fetch_array($q);
    echo $dt[0];
}
?>
<form method="get" action="?nota=001">
    <input type="text" name="kd_barang" onchange="">
</form>

