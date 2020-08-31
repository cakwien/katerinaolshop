<?php

function rhs($isi)
{
    $encode=base64_encode($isi);
    return $encode;
}

function bukarhs($isi)
{
    $decode=base64_decode($isi);
    return $decode;
}

function rp($angka)
{
    $a=number_format($angka,0,',','.');
    return $a;
}

?>