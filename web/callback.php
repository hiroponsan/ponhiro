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



else if ($text == 'ランキング') {
  $response_format_text = [
  "type" => "template",
    "altText" => "ランキング

    ",
    "template" => [
      "type" => "carousel",
      "columns" => [
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/ode.jpg",
            "title" => "1位 オデッセイ",
            "text" => "価格：432円〜",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "告知を見る",
                  "data" => "action=rsv&itemid=111"
              ],
              [
                  "type" => "postback",
                  "label" => "Webで詳細を見る",
                  "data" => "action=pcall&itemid=111"
              ],
              [
                  "type" => "uri",
                  "label" => "購入する",
                  "uri" => "https://" . $_SERVER['SERVER_NAME'] . "/"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/star.jpg",
            "title" => "2位 スターウォーズ",
            "text" => "価格：432円〜",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "告知を見る",
                  "data" => "action=rsv&itemid=222"
              ],
              [
                  "type" => "postback",
                  "label" => "Webで詳細を見る",
                  "data" => "action=pcall&itemid=222"
              ],
              [
                  "type" => "uri",
                  "label" => "購入する",
                  "uri" => "https://" . $_SERVER['SERVER_NAME'] . "/"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/intern.jpg",
            "title" => "3位 マイ・インターン",
            "text" => "価格：432円〜",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "告知を見る",
                  "data" => "action=rsv&itemid=222"
              ],
              [
                  "type" => "postback",
                  "label" => "Webで詳細を見る",
                  "data" => "action=pcall&itemid=222"
              ],
              [
                  "type" => "uri",
                  "label" => "購入する",
                  "uri" => "https://" . $_SERVER['SERVER_NAME'] . "/"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/img2-4.jpg",
            "title" => "4位 007スペクター",
            "text" => "価格：432円〜",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "告知を見る",
                  "data" => "action=rsv&itemid=222"
              ],
              [
                  "type" => "postback",
                  "label" => "Webで詳細を見る",
                  "data" => "action=pcall&itemid=222"
              ],
              [
                  "type" => "uri",
                  "label" => "購入する",
                  "uri" => "https://" . $_SERVER['SERVER_NAME'] . "/"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/img2-5.jpg",
            "title" => "5位 デットプール",
            "text" => "価格：432円〜",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "告知を見る",
                  "data" => "action=rsv&itemid=222"
              ],
              [
                  "type" => "postback",
                  "label" => "Webで詳細を見る",
                  "data" => "action=pcall&itemid=222"
              ],
              [
                  "type" => "uri",
                  "label" => "購入する",
                  "uri" => "https://" . $_SERVER['SERVER_NAME'] . "/"
              ],
       [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/more.jpg",
            "title" => "",
            "text" => "",
            "actions" => [
              [
                  "type" => "uri",
                  "label" => "ランキングをもっと見る",
                  "uri" => "http://video.rakuten.co.jp/static/cpn/spl000036/?l-id=home_unit04_01"
              ],
              [
                  "type" => "postback",
                  "label" => "他の商品を探す",
                  "data" => "action=pcall&itemid=222"
              ],
              [
                  "type" => "uri",
                  "label" => "キャンペーンを見る",
                  "uri" => "https://" . $_SERVER['SERVER_NAME'] . "/"
              
            ]
          ]
      ]
    ]
     
  ];
} 

else if ($text == 'オススメ') {
  $response_format_text = [
  "type" => "template",
    "altText" => "ランキングオススメだよー

    ",
    "template" => [
      "type" => "carousel",
      "columns" => [
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/reco_1.png",
            "title" => "ハドソン川の奇跡",
            "text" => "価格：432円〜",
            "actions" => [
              [
                  "type" => "uri",
                  "label" => "告知を見る",
                  "uri" => "http://video.rakuten.co.jp/content/203761/?l-id=home_slider01"
              ],
              [
                  "type" => "uri",
                  "label" => "Webで詳細を見る",
                  "uri" => "http://video.rakuten.co.jp/content/203761/?l-id=home_slider01"
              ],
              [
                  "type" => "uri",
                  "label" => "購入する",
                  "uri" => "http://video.rakuten.co.jp/content/203761/?l-id=home_slider01"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/reco_2.png",
            "title" => "インフェルノ",
            "text" => "価格：432円〜",
            "actions" => [
              [
                  "type" => "uri",
                  "label" => "告知を見る",
                  "uri" => "http://video.rakuten.co.jp/content/206271/"
              ],
              [
                  "type" => "uri",
                  "label" => "特集ページを見る",
                  "uri" => "http://video.rakuten.co.jp/special/inferno/?l-id=home_slider02"
              ],
              [
                  "type" => "uri",
                  "label" => "購入する",
                  "uri" => "http://video.rakuten.co.jp/content/206271/"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/reco_3.png",
            "title" => "スター・トリック",
            "text" => "価格：432円〜",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "告知を見る",
                  "data" => "action=rsv&itemid=222"
              ],
              [
                  "type" => "uri",
                  "label" => "特集ページを見る",
                  "uri" => "http://video.rakuten.co.jp/special/startrekbeyond/?l-id=home_slider03"
              ],
              [
                  "type" => "uri",
                  "label" => "購入する",
                  "uri" => "http://video.rakuten.co.jp/content/206270/"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/img2-4.jpg",
            "title" => "4位 007スペクター",
            "text" => "価格：432円〜",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "告知を見る",
                  "data" => "action=rsv&itemid=222"
              ],
              [
                  "type" => "postback",
                  "label" => "Webで詳細を見る",
                  "data" => "action=pcall&itemid=222"
              ],
              [
                  "type" => "uri",
                  "label" => "購入する",
                  "uri" => "https://" . $_SERVER['SERVER_NAME'] . "/"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/img2-5.jpg",
            "title" => "5位 デットプール",
            "text" => "価格：432円〜",
            "actions" => [
              [
                  "type" => "postback",
                  "label" => "告知を見る",
                  "data" => "action=rsv&itemid=222"
              ],
              [
                  "type" => "postback",
                  "label" => "Webで詳細を見る",
                  "data" => "action=pcall&itemid=222"
              ],
              [
                  "type" => "uri",
                  "label" => "購入する",
                  "uri" => "https://" . $_SERVER['SERVER_NAME'] . "/"
              ]
            ]
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
