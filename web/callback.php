<?php
define('TOKEN', 'トークンを入力');

//callback確認
$obj = json_decode(file_get_contents('php://input'));

//textとreplyToken取得
$event = $obj->{"events"}[0];
$text = $event->{"message"}->{"text"};
$replyToken = $event->{"replyToken"};

$post = [
    "replyToken" => $replyToken,
    "messages" => [
                    "type" => "text",
                    "text" => $text]
                  ];

$ch = curl_init("https://api.line.me/v2/bot/message/reply");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charser=UTF-8',
    'Authorization: Bearer ' . TOKEN;
    ));