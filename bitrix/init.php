<?
AddEventHandler("search", "BeforeIndex", "BeforeIndexHandler");
AddEventHandler("sale", "OnSaleComponentOrderOneStepProcess", "ajaxOrderStep");
AddEventHandler("sale", "OnBeforeOrderAccountNumberSet", "generateRandomOrder");

session_start();

function generateRandomOrder($test){
	return rand(1,9).(($test-288325)+100).rand(100,999);
}

function IsMobile(){
    $user_agent = strtolower ($_SERVER['HTTP_USER_AGENT']);
    if (preg_match("/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent))
        return true;
    else if (preg_match("/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent))
        return true;

    return false;
}

function BeforeIndexHandler($arFields) {
	CModule::IncludeModule("catalog");
	CModule::IncludeModule("search");
	
	$itemID = $arFields['ITEM_ID'];
	$itemPrice = '';
	
	$db_res = CPrice::GetList(
			array(),
			array(
					"PRODUCT_ID" => $itemID,
					"CATALOG_GROUP_ID" => 1 
				)
		);
	if ($ar_res = $db_res->Fetch())
	{
		$itemPrice = intval($ar_res["PRICE"]);
	}
	
	if($itemPrice) {
		$arFields = array(
			"SITE_ID"	=> "s1",
			"MODULE_ID"	=> "iblock",
			"PARAM1"	=> "1c_catalog",
			"PARAM2"	=> 8,
			"ITEM_ID"	=> $itemID,
			"RANK"		=> $itemPrice
		);
		
		$cCustomRank = new CSearchCustomRank;
	
		$res = CSearchCustomRank::GetList(array(), array("ITEM_ID" => $itemID));
		if($ar = $res->GetNext()) {
			$cCustomRank->Update($ar['ID'], $arFields);
		}
		else {
			$cCustomRank->Add($arFields);
		}
	}
}

function ajaxOrderStep($arResult, $arUserResult) {
	$commission = 0;
    if($arUserResult['PAY_SYSTEM_ID'] == 7) {  // payU
        $commission = 0.039;
    }
    if($arUserResult['PAY_SYSTEM_ID'] == 10) {  // payU - Курьер
        $commission = 0.05;
    }
    elseif($arUserResult['PAY_SYSTEM_ID'] == 9) {  // KupiVkredit
        $commission = 0.05;
    }
    if($arUserResult['PAY_SYSTEM_ID'] == 11) {  // Beznal
        $commission = 0.05;
    }
    
	if($commission && $arResult['ORDER_PRICE']) {
		$arResult['PAYMENT_PRICE'] = ($arResult['ORDER_PRICE'] + $arResult['DELIVERY_PRICE'])*$commission;
		$arResult['PAYMENT_PRICE_FORMATED'] = number_format($arResult['PAYMENT_PRICE'], 2, '.', ' ') . ' руб.';
		$orderTotal = $arResult['ORDER_PRICE'] + $arResult['PAYMENT_PRICE'] + $arResult['DELIVERY_PRICE'];
		$arResult['ORDER_TOTAL_PRICE_FORMATED'] = number_format($orderTotal, 2, '.', ' ') . ' руб.';
	} 
}


//global $DB;
function GetRefferer(){
    global $DB;

// Доп. модуль для генерации номера по рефереру посетителя
    $host = '';

    //$pont_id='11000';
    if(isset($_SESSION['ref_id'])){  // !!!! <<<
        $ref_id=$_COOKIE['ref_id'];
        //var_dump($_COOKIE['ref_id']);die;
    }else{
        if((!empty($_SERVER["HTTP_REFERER"]) && !preg_match("/http:\/\/www\.up-house\.ru/is",$_SERVER["HTTP_REFERER"])) || !empty($_GET["utm_source"])){

            function extractKeyword($url) {
                $searchEngines = array(
                    'google.' => 'q',
                    'yahoo.' => 'p',
                    'live.' => 'q',
                    'msn.' => 'q',
                    'aol.' => 'query',
                    'aol.' => 'encquery',
                    'lycos.' => 'query',
                    'ask.' => 'q',
                    'altavista.' => 'q',
                    'netscape.' => 'query',
                    'cnn.' => 'query',
                    'looksmart.' => 'qt',
                    'about.' => 'terms',
                    'mamma.' => 'query',
                    'alltheweb.' => 'q',
                    'gigablast.' => 'q',
                    'voila.' => 'rdata',
                    'virgilio.' => 'qs',
                    'baidu.' => 'wd',
                    'alice.' => 'qs',
                    'yandex.' => 'text',
                    'najdi.' => 'q',
                    'aol.' => 'q',
                    'club-internet.' => 'q',
                    'mama.' => 'query',
                    'seznam.' => 'q',
                    'search.' => 'q',
                    'szukaj.' => 'szukaj',
                    'szukaj.' => 'qt',
                    'netsprint.' => 'q',
                    'szukacz.' => 'q',
                    'yam.' => 'k',
                    'pchome.' => 'q',
                    'mail.ru' => 'q',
                    'bing.' => 'q',
                    'nigma.ru' => 's',
                    'rambler.ru' => 'words',
                    'meta.ua' => 'q',
                    'bigmir.net' => 'q',
                    'aport.ru' => 'r',
                    'a-counter' => 'sub_data',
                    'i.ua' => 'q'
                );

                $host = parse_url($url, PHP_URL_HOST);
                $query = parse_url($url, PHP_URL_QUERY);
                $queryItems = array();
                parse_str($query, $queryItems);

                foreach ($searchEngines as $needle=>$param) {
                    if (strpos($host, $needle)!==false && !empty($queryItems[$param])) {
                        return urldecode($queryItems[$param]);
                    }
                }
                foreach ($searchEngines as $needle=>$param) {
                    if (strpos($host, $needle)!==false) {
                        return "скрыт";
                    }
                }
                return false;
            }
            preg_match('@^(?:https?://)?([^/]+)@i',$_SERVER["HTTP_REFERER"], $matches);
            $host = str_replace("www.","",$matches[1]);

            //if(strpos($host, 'apple-house.ru') !== FALSE || strpos($host, 'up-house.ru') !== FALSE) return;
            
            $host2= "";
            if(!empty($_GET["utm_source"])){
                $host2="UTM SOURCE";
                $host=$_GET["utm_source"];
            }
            if(!empty($_GET["_openstat"])){
                $host2="OPENSTAT";
                list($host)=explode(";",base64_decode($_GET["_openstat"]));
            }
            
            if($host2=="UTM SOURCE" && preg_match("/topadvert_/is",$host))$host="TOPADVERT";
            if($host=="m.vk.com")$host="vk.com";
            if($host=="torg.mail.ru")$host2="REFERRAL";

            if(empty($host2)){
                $keyword = extractKeyword($_SERVER['HTTP_REFERER']);
                //$keyword=iconv('utf-8','cp1251',$keyword);
                //echo ($_SERVER['HTTP_REFERER']);
                if(!empty($keyword)){
                    //$host='Поиск (Остальные)';
                    if(preg_match('/google/',$host))
                        $host='Поиск (Google)';
                    if(preg_match('/yandex/',$host))
                        $host='Поиск (Yandex)';
                    if(preg_match('/mail/',$host))
                        $host='Поиск (Mail)';
                    if(!preg_match('/Поиск/',$host))
                        $host='Поиск (Остальные)';
//                    if(preg_match('/123|айгаджет|igadget/is',$keyword)){$host2='Брендовый (123)';}else{$host2='Чистый';}
                    //$host2 .= $keyword;
                }
            }

            $res = $DB->Query("select * from `referer` where `host` = '".$host."' and `params`='".$host2."'");
            $row = $res->Fetch();
            if($row){
                $ref_id=$row["id"];
                $res = $DB->Query("update `referer` set `visitors`=`visitors`+1 where `host` = '".$host."' and `params`='".$host2."'");
                //if($ref_id>50)$ref_id=50;
                $_SESSION['ref_id']=$ref_id;
                setcookie ('ref_id', $ref_id, time()+36000000, "/");
                //var_dump($_SESSION['ref_id']);die;
            }else{
                $res = $DB->Query("insert into `referer` (`host`,`params`,`visitors`) values ('".$host."','".$host2."',1)");
                $ref_id=mysql_insert_id($DB);
                //if($ref_id>50)$ref_id=50;
                $_SESSION['ref_id']=$ref_id;
                //var_dump($_SESSION['ref_id']);die;
                setcookie ('ref_id', $ref_id, time()+36000000, "/");

            }
        }else{
            $ref_id="77";
            setcookie ('ref_id', $ref_id, time()+36000000, "/");
            $_SESSION['ref_id']=$ref_id;
        }

    }


    //var_dump($ref_id);die;
    if(!isset($_COOKIE["HTTP_REFERER"])){
        setcookie ('HTTP_REFERER', $ref_id, time()+3600, "/");
        if(!isset($_COOKIE["REFERER_HOST"]) || empty($_COOKIE["REFERER_HOST"]))
            setcookie ('REFERER_HOST', $host, time()+3600, "/");
    }
    //
    return $ref_id;
}

GetRefferer();
?>