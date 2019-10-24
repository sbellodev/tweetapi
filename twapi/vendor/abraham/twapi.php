<?php

$key = '';
$key_secret = '';
$token = '';
$token_secret = '';

// Librería
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

// Conecta con API
$connection = new TwitterOAuth($key, $key_secret, $token, $token_secret);
$content = $connection->get("account/verify_credentials");

$status = $connection->get("statuses/user_timeline", ["count" => 2, "exclude_replie" => true]);
echo "<pre>";
print_r($status);
echo "</pre>";

?>