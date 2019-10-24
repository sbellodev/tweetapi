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
//$content = $connection->get("account/verify_credentials");

// https://developer.twitter.com/en/docs/tweets/timelines/api-reference/get-statuses-user_timeline
$user = "debellodev";
$status = $connection->get("statuses/user_timeline", ["screen_name" => $user, "count" => 200, "exclude_replies" => true, "include_rts" => false]);

echo "<pre>";
//print_r($status);

echo "</pre>";
$length = count((array)$status);

for($i = 0; $i < $length; $i++) {
    // echo $status[$i]->text . "  -  ";
    echo $status[$i]->id . "  -  ";
    // echo $status[$i]->created_at . "<br><br>";
}
//print($status[$length - 1]->id);
$ultima_id = $status[$length - 1]->id;
$a = 0;
$todo = [];
while ($a < 2) {
    $connection = new TwitterOAuth($key, $key_secret, $token, $token_secret);
    echo "<br>$ultima_id<br>";
    
    $status = $connection->get("statuses/user_timeline", ["screen_name" => $user, "count" => 200, "max_id" => $ultima_id, "exclude_replies" => true, "include_rts" => false]);
    
    $length = $total = count((array)$status);
    
    echo "<br>$ultima_id<br>";

    for($i = 0; $i < $length; $i++) {
        echo $status[$i]->text . "  -  ";
        //echo $status[$i]->id . "  -  ";
        echo $status[$i]->created_at . "<br><br>";
        $todo[] = $status[$i]->text;
        $todo[] = $status[$i]->created_at;
    }
    echo "<br><br><br><br><br><br> SUUUUUUUU <br><br><br><br><br>";
    $a++;
    $ultima_id = bcsub($ultima_id, 1);
}
var_dump($todo);

echo "<pre>";


echo "</pre>";


//$status = $connection->get("statuses/user_timeline", ["screen_name" => $user, "count" => 200, "exclude_replies" => true, "include_rts" => false]);


?>