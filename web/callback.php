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
            "title" => "第1門. ヒロポンはどれ??",
            "text" => "A. 織田信長",
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
            "title" => "第1門. ヒロポンはどれ??",
            "text" => "B. ウォーレン・バフェット",
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
            "title" => "第1門. ヒロポンはどれ??",
            "text" => "C. ライオン",
            "actions" => [
              [
                  "type" => "message",
                  "label" => "選択",
                  "text" => "C."
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/image4.jpeg",
            "title" => "第1門. ヒロポンはどれ??",
            "text" => "D. 全部当てはまる",
            "actions" => [
              [
                  "type" => "message",
                  "label" => "選択",
                  "text" => "D."
              ]
            ]
          ]
      ]
    ]
  ];
} else if ($text == 'D.') {
   $response_format_text = [
    "type" => "template",
    "altText" => "正解！ 第2門. さやかちゃんは今日何歳になった？",
    "template" => [
      "type" => "buttons",
      "title" => "正解！",
      "text" => "第2門. さやかちゃんは今日何歳になった？",
      "actions" => [
          [
            "type" => "message",
            "label" => "2ちゃい",
            "text" => "2ちゃい"
          ],
          [
           "type" => "message",
            "label" => "23ちゃい",
            "text" => "23ちゃい"
          ],
          [
           "type" => "message",
            "label" => "24 years old",
            "text" => "24 years old"
          ],
          [
           "type" => "message",
            "label" => "おばちゃん",
            "text" => "おばちゃん"
          ]
      ]
    ]
  ];
} else if ($text == '24 years old') {
   $response_format_text = [
    "type" => "template",
    "altText" => "正解♪ 第3門. 今日のデートはどうだった？",
    "template" => [
      "type" => "buttons",
      "title" => "正解♪",
      "text" => "第3門. 今日のデートはどうだった？",
      "actions" => [
          [
            "type" => "message",
            "label" => "最高！",
            "text" => "最高！"
          ],
          [
           "type" => "message",
            "label" => "まあまあかな",
            "text" => "まあまあかな"
          ],
          [
           "type" => "message",
            "label" => "ちょっと微妙や。。",
            "text" => "ちょっと微妙や。。"
          ],
          [
           "type" => "message",
            "label" => "出直してこい♪",
            "text" => "出直してこい♪"
          ]
      ]
    ]
  ];
} else if ($text == '24 years old') {
   $response_format_text = [
    "type" => "template",
    "altText" => "正解♪ 第3門. 今日のデートはどうだった？",
    "template" => [
      "type" => "buttons",
      "title" => "正解♪",
      "text" => "第3門. 今日のデートはどうだった？",
      "actions" => [
          [
            "type" => "message",
            "label" => "最高！",
            "text" => "最高！"
          ],
          [
           "type" => "message",
            "label" => "まあまあかな",
            "text" => "まあまあかな"
          ],
          [
           "type" => "message",
            "label" => "ちょっと微妙や。。",
            "text" => "ちょっと微妙や。。"
          ],
          [
           "type" => "message",
            "label" => "出直してこい♪",
            "text" => "出直してこい♪"
          ]
      ]
    ]
  ]; 
} else if ($text == '最高！' or $text == 'まあまあかな' or $text == 'ちょっと微妙や。。' or $text == '出直してこい♪') {
  $response_format_text = [
    "type" => "template",
    "altText" => "メルカリで売られたのは次のうちどれ？",
    "template" => [
      "type" => "carousel",
      "columns" => [
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/music.jpeg",
            "title" => "最終問題♪",
            "text" => "さやかちゃんが今一番勉強したいのは？",
            "actions" => [
              [
                 "type" => "message",
                  "label" => "音楽",
                  "text" => "音楽"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/design.jpeg",
            "title" => "最終問題♪",
            "text" => "さやかちゃんが今一番勉強したいのは？",
            "actions" => [
              [
                   "type" => "message",
                  "label" => "デザイン",
                  "text" => "デザイン"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/both.jpeg",
            "title" => "最終問題♪",
            "text" => "さやかちゃんが今一番勉強したいのは？",
            "actions" => [
              [
                   "type" => "message",
                  "label" => "音楽とデザイン両方♪",
                  "text" => "音楽とデザイン両方♪"
              ]
            ]
          ]
      ]
    ]
  ];
} else if ($text == '音楽とデザイン両方♪') {
  $response_format_text = [
    "type" => "template",
    "altText" => "こちらの〇〇はいかがですか？",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/jobs.png",
      "title" => "全問正解♪",
      "text" => "おめでとう♪誕生日プレゼントを受け取りますか？",
      "actions" => [
          [
            "type" => "message",
            "label" => "受け取る",
            "text" => "受け取る"
          ]
      ]
    ]
  ];
} else if ($text == '受け取る') {
   $response_format_text = [
    "type" => "template",
    "altText" => "こちらの〇〇はいかがですか？",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/present.png",
      "title" => "プレゼントや♪",
      "text" => "ちょっと待っててな〜",
      "actions" => [
          [
            "type" => "postback",
            "label" => "今ひろぽんが準備する〜♪",
            "data" => "action=pcall&itemid=123"
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