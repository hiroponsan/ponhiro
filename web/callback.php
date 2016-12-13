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

if ($text == 'はい') {
  $response_format_text = [
     "type" => "text",
     "text" => "ヒロポンbotが答えてくれるよ。何でも聞いてみよう。
  例.　明日の天気は？　ひろぽんの体重　あなたの運勢　など"
  ];
} 

//返信データ作成
else if ($text == 'ひろぽんの体重') {
  $response_format_text = [
     "type" => "text",
     "text" => "53キロ"
  ];
} 

else if ($text == '明日の天気は？') {
  $response_format_text = [
     "type" => "text",
     "text" => "曇りだお"
  ];
} 

else if ($text == 'あなたの運勢') {
  $response_format_text = [
     "type" => "text",
     "text" => "信じる者にのみ道は開かれる。 Just do it!"
  ];
} 

else if ($text == 'ひろぽんの身長') {
  $response_format_text = [
     "type" => "text",
     "text" => "162センチ"
  ];
} 

else if ($text == 'ひろぽんの好きな食べ物') {
  $response_format_text = [
     "type" => "text",
     "text" => "お寿司"
  ];
} 

else if ($text == 'ひろぽんの好きなスポーツ') {
  $response_format_text = [
     "type" => "text",
     "text" => "テニス"
  ];
} 

else if ($text == 'ひろぽんの趣味') {
  $response_format_text = [
     "type" => "text",
     "text" => "ゲーム"
  ];
} 


else if ($text == 'いいえ') {
  $response_format_text = [
    "type" => "template",
    "altText" => "はいって言うまで終わらないよ？（はい／いいえ）",
    "template" => [
        "type" => "confirm",
        "text" => "はいって言うまで終わらないよ？",
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


else if ($text == 'ひろぽんクイズ') {
  $response_format_text = [
    "type" => "template",
    "altText" => "3問あるよ",
    "template" => [
      "type" => "carousel",
      "columns" => [
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/img2-1.jpg",
            "title" => "第１門",
            "text" => "ヒロポンの口癖は？",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "肉食いてー",
                  "data" => "action=rsv&itemid=111"
              ],
              [
                  "type" => "postback",
                  "label" => "ハラヘッタ",
                  "data" => "action=pcall&itemid=111"
              ],
              [
                  "type" => "uri",
                  "label" => "ここはどこ？",
                  "uri" => "https://" . $_SERVER['SERVER_NAME'] . "/"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/img2-2.jpg",
            "title" => "第2門",
            "text" => "ヒロポンの携帯は？",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "iPhone７",
                  "data" => "action=rsv&itemid=222"
              ],
              [
                  "type" => "postback",
                  "label" => "Android",
                  "data" => "action=pcall&itemid=222"
              ],
              [
                  "type" => "uri",
                  "label" => "ガラケー",
                  "uri" => "https://" . $_SERVER['SERVER_NAME'] . "/"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/img2-3.jpg",
            "title" => "第3問",
            "text" => "今ひろぽんはどこにいる？",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "大分県",
                  "data" => "action=rsv&itemid=333"
              ],
              [
                  "type" => "postback",
                  "label" => "楽天",
                  "data" => "action=pcall&itemid=333"
              ],
              [
                  "type" => "uri",
                  "label" => "Amazon",
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
    "altText" => "こんにちわ 何かご用ですか？（はい／いいえ）",
    "template" => [
        "type" => "confirm",
        "text" => "こんにちわ 何かご用ですか？",
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
