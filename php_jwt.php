<?php

require __DIR__ . '/vendor/autoload.php';

use Firebase\JWT\JWT;

/**
 * Authenticate your users
 */

$key  = "{your secret key}";
$iss  = "{issuer}";

$now  = time();
$token = array(
  "jti"   => md5($now . rand()),
  "iat"   => $now,
  "iss" => $iss,
  "username"  => "{username}",
  "firstname" => "{firstname}",
  "lastname" => "{lastname}",
  "phonenumber" => "{phonenumber}",
  "sitenumbers" => array('{siteNum1}',{'siteNum2'})
);

//generate the JWT
$jwt = JWT::encode($token, $key);

//form the location to pass the JWT token too.
$location = "http://pestalert.mitie-xtra.com/sso?token=".$jwt;

// Redirect
header("Location: " . $location);

?>
