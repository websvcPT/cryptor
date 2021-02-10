<?php
include("CryptorFixedIv.php");

$data = '{"val1":"xxxxxx"}';

$encryption_key = "964POMWCLRCP+A0ER3UMRPODSJGFV3843QĹK,FD9843MQewocm3c4";
$crypt = new CryptorFixedIv($encryption_key);
$encrypted = $crypt->encrypt($data);
echo "\nencrypted: " . $encrypted;

$crypt = new CryptorFixedIv($encryption_key);
echo "\ndecrypted: " . $crypt->decrypt($encrypted);
echo chr(10);
