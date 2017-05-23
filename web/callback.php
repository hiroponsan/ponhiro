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
    "altText" => "メルカリで売られたのは",
    "template" => [
      "type" => "carousel",
      "columns" => [
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/image7.jpeg",
            "title" => "●●レストラン",
            "text" => "こちらにしますか？",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "予約する",
                  "data" => "action=rsv&itemid=111"
              ],
              [
                  "type" => "postback",
                  "label" => "電話する",
                  "data" => "action=pcall&itemid=111"
              ],
              [
                  "type" => "uri",
                  "label" => "詳しく見る（ブラウザ起動）",
                  "uri" => "https://" . $_SERVER['SERVER_NAME'] . "/"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/img2-2.jpg",
            "title" => "▲▲レストラン",
            "text" => "それともこちら？（２つ目）",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "予約する",
                  "data" => "action=rsv&itemid=222"
              ],
              [
                  "type" => "postback",
                  "label" => "電話する",
                  "data" => "action=pcall&itemid=222"
              ],
              [
                  "type" => "uri",
                  "label" => "詳しく見る（ブラウザ起動）",
                  "uri" => "https://" . $_SERVER['SERVER_NAME'] . "/"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/img2-3.jpg",
            "title" => "■■レストラン",
            "text" => "はたまたこちら？（３つ目）",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "予約する",
                  "data" => "action=rsv&itemid=333"
              ],
              [
                  "type" => "postback",
                  "label" => "電話する",
                  "data" => "action=pcall&itemid=333"
              ],
              [
                  "type" => "uri",
                  "label" => "詳しく見る（ブラウザ起動）",
                  "uri" => "https://" . $_SERVER['SERVER_NAME'] . "/"
              ]
            ]
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