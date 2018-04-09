<?php
define('URL', 'https://bress-juan.carians.fr/api/apiapi.php');
define('CRYPTKEY','rx4/YK51nJo7LuRnZAz/jpXZbCunkNplneL6ugkBs5g=');
define('CRYPTALGO','aes-256-cbc');

function cryptstring($text){
  $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
  $encryption_key = base64_decode(CRYPTKEY);
  $cryptedid = openssl_encrypt ($text,CRYPTALGO,$encryption_key,0,$iv);
  return base64_encode($cryptedid.'::'.$iv);
}

function decryptstring($text){
  $encryption_key = base64_decode(CRYPTKEY);
  list($encrypted_data, $iv) = explode('::', base64_decode($text), 2);
  return openssl_decrypt($encrypted_data,CRYPTALGO,$encryption_key,0,$iv);
}
