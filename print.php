<?php
$Url = "https://www.gaitameonline.com/rateaj/getrate";
$Content = file_get_contents($Url);
$Data = json_decode($Content, true);

$Country_Names = array("アメリカ", "中国", "フランス", "ドイツ", "イタリア", "イギリス", "カナダ");
$Money_Unit = array("ドル", "元", "ユーロ", "ユーロ", "ユーロ", "ポンド", "カナダドル");
$Setting_Money = array("USDJPY", "CNYJPY", "EURJPY", "EURJPY", "EURJPY", "GBPJPY", "CADJPY");
$CheckControl = array("America", "China", "France", "Germany", "Italy", "Uk", "Canada");

function Check_Country($print, $Country_Names) {
    for ($i = 0; $i < count($Country_Names); $i++) {
        if ($Country_Names[$i] == $print) {
            return $i;
        }
    }
}

$Get_Money = $_POST["a"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectCountry = $_POST["selectcountry"];
    if (isset($Get_Money)) {
        if ($Get_Money == "") {
            print "金額が入力されていません";
            print "<br />";
        } else {
            $i = Check_Country($selectCountry, $CheckControl);
            if ($i !== false) {
                for ($j = 0; $j < 23; $j++) {
                    if ($Setting_Money[$i] == $Data['quotes'][$j]['currencyPairCode']) {
                        $jpyAmount = $Get_Money / $Data['quotes'][$j]['ask'];
                        $SetMoney = round($jpyAmount, 2);
                    }
                }
                print $Country_Names[$i] . "での金額は " . $SetMoney. $Money_Unit[$i] . "です。";
                print "<br />";
            } else {
                print "指定した国が見つかりません。";
            }
        }
    }
}
?>

<a href='index.php'>トップに戻る</a>
