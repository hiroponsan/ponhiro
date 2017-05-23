<?php
$accessToken = getenv('LINE_CHANNEL_ACCESS_TOKEN');
//ユーザーからのメッセージ取得
$json_string = file_get_contents('php://input');
$jsonObj = json_decode($json_string);
$type = $jsonObj->{"events"}[0]->{"message"}->{"type"};
//メッセージ取得
$text = $jsonObj->{"events"}[0]->{"message"}->{"text"};
//ReplyToken取得
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};
//メッセージ以外のときは何も返さず終了
if($type != "text"){
  exit;
}
//返信データ作成
if ($text == 'はい') {
  $response_format_text = [
    "type" => "template",
    "altText" => "候補を３つご案内しています。",
    "template" => [
      "type" => "carousel",
      "columns" => [
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/image1.jpeg",
            "title" => "ヒロポンはどれ??",
            "text" => "A.",
            "actions" => [
              [
                  "type" => "message",
                  "label" => "選択",
                  "text" => "A."
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/image2.jpeg",
            "title" => "ヒロポンはどれ??",
            "text" => "B.",
            "actions" => [
              [
                  "type" => "message",
                  "label" => "選択",
                  "text" => "B."
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/image3.jpeg",
            "title" => "ヒロポンはどれ??",
            "text" => "C.",
            "actions" => [
              [
                  "type" => "message",
                  "label" => "選択",
                  "text" => "C."
              ]
            ]
          ]
      ]
    ]
  ];
} else if ($text == 'C.') {
  $response_format_text = [
    "type" => "template",
    "altText" => "クイズは全部で５門です。それでは準備はいいですか？",
    "template" => [
        "type" => "confirm",
        "text" => "そんな誕生日のさやかちゃんにプレゼントをかけたクイズです♪ 準備はいいですか？",
        "actions" => [
            [
              "type" => "message",
              "label" => "はい",
              "text" => "はい"
            ],
            [
              "type" => "message",
              "label" => "いいえ",
              "text" => "いいえ"
            ]
        ]
    ]
  ];
} else {
  $response_format_text = [
    "type" => "template",
    "altText" => "クイズは全部で５門です。それでは準備はいいですか？",
    "template" => [
        "type" => "confirm",
        "text" => "そんな誕生日のさやかちゃんにプレゼントをかけたクイズです♪ 準備はいいですか？",
        "actions" => [
            [
              "type" => "message",
              "label" => "はい",
              "text" => "はい"
            ],
            [
              "type" => "message",
              "label" => "いいえ",
              "text" => "いいえ"
            ]
        ]
    ]
  ];
}
$post_data = [
  "replyToken" => $replyToken,
  "messages" => [$response_format_text]
  ];
$ch = curl_init("https://api.line.me/v2/bot/message/reply");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charser=UTF-8',
    'Authorization: Bearer ' . $accessToken
    ));
$result = curl_exec($ch);
curl_close($ch);