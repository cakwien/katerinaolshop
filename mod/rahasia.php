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

?>