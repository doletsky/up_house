<?
//var_dump($arResult["SECTIONS"]);

$filtered_urls=array(
'/brands',
'/reduced_price',
'/category_36',
'/sale',
'/best_offers',
'/gadgets/sport$',
'/gadgets/home$',
'/gadgets/external_drives$',
'/gadgets/radio_modeli$',
'/gadgets/stereo$',
'/gadgets/headphones$',
'/gadgets/stilus$',
'/gadgets/DJI_copter',
'/other',
'/gadgets/sport/action_camera',

);
foreach($arResult["SECTIONS"] as $key => $arSectionList)
{
    foreach($arSectionList as $skey => $arSections)
    {
        if ($key == 'TOP')
        {
            $arResult["SECTIONS"][$key][$skey]["SECTION_PAGE_URL"] = str_replace('%2F', '/', $arSections["SECTION_PAGE_URL"]);
            
	           //$arResult["SECTIONS"][$key][$skey]["NAME"]=str_replace('Умные часы ','',$arResult["SECTIONS"][$key][$skey]["NAME"]);
	           //$arResult["SECTIONS"][$key][$skey]["NAME"]=str_replace('на платформе','',$arResult["SECTIONS"][$key][$skey]["NAME"]);
	           
            foreach($filtered_urls as $url){
                if(preg_match("#".$url."#is",$arResult["SECTIONS"][$key][$skey]["SECTION_PAGE_URL"]))
                    unset($arResult["SECTIONS"][$key][$skey]);
            }
        }
        else
        {
            foreach($arSections as $sskey => $arSection)
            {
                $arResult["SECTIONS"][$key][$skey][$sskey]["SECTION_PAGE_URL"] = str_replace('%2F', '/', $arSection["SECTION_PAGE_URL"]);
                $arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]=str_replace('Умные часы ','',$arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]);
                $arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]=str_replace('на платформе ','',$arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]);
                
                foreach($filtered_urls as $url){
                    if(preg_match("#".$url."#is",$arResult["SECTIONS"][$key][$skey][$sskey]["SECTION_PAGE_URL"]))
                        unset($arResult["SECTIONS"][$key][$skey][$sskey]);
                }
				             
                if($arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]=='MacBook'){
	                 unset($arResult["SECTIONS"][$key][$skey][$sskey]);
	                 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"MacBook Air","SECTION_PAGE_URL"=>'/macbook/air');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"MacBook Pro Retina","SECTION_PAGE_URL"=>'/macbook/pro-retina');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"MacBook Air 12","SECTION_PAGE_URL"=>'/macbook/12');
                }
				
				if($arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]=='Nexus'){
	                 unset($arResult["SECTIONS"][$key][$skey][$sskey]);
	                 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Nexus 5","SECTION_PAGE_URL"=>'/smartphones/nexus/nexus_5');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Nexus 6","SECTION_PAGE_URL"=>'/smartphones/nexus/nexus_6');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"BlackBerry","SECTION_PAGE_URL"=>'/smartphones/other/blackberry');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Huawei","SECTION_PAGE_URL"=>'/smartphones/other/huawei');
                }
				
				if($arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]=='iMac'){
					unset($arResult["SECTIONS"][$key][$skey][$sskey]);
					$arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"<b>iMac</b>","SECTION_PAGE_URL"=>'/imac');
	                 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"iMac 21.5","SECTION_PAGE_URL"=>'/imac/21');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"iMac 27","SECTION_PAGE_URL"=>'/imac/27');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"iMac Retina 5K","SECTION_PAGE_URL"=>'/imac/27_5K');
                }
				
				if($arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]=='Samsung Galaxy'){
					unset($arResult["SECTIONS"][$key][$skey][$sskey]);
	                 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Samsung Galaxy","SECTION_PAGE_URL"=>'/smartphones/samsung');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Samsung Galaxy S5","SECTION_PAGE_URL"=>'/smartphones/samsung_galaxy_S5');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Samsung Galaxy S6","SECTION_PAGE_URL"=>'/smartphones/samsung_galaxy_S6');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Samsung Galaxy Note 4","SECTION_PAGE_URL"=>'/smartphones/samsung_galaxy_note_4');
                }
				
				if($arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]=='Pebble'){
					unset($arResult["SECTIONS"][$key][$skey][$sskey]);
	                 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Pebble SmartWatch","SECTION_PAGE_URL"=>'/gadgets/watch/pebble');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Pebble Steel","SECTION_PAGE_URL"=>'/gadgets/watch/pebble/Pebble_Steel');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Pebble Time","SECTION_PAGE_URL"=>'/gadgets/watch/pebble/Pebble_Time');
                }
				
				if($arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]=='Браслеты Jawbone UP'){
					unset($arResult["SECTIONS"][$key][$skey][$sskey]); 
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Браслеты Jawbone UP","SECTION_PAGE_URL"=>'/gadgets/bracelet/jawbone_up');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Jawbone UP 24","SECTION_PAGE_URL"=>'/gadgets/bracelet/jawbone_up24');
	                 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Jawbone UP 2","SECTION_PAGE_URL"=>'/gadgets/bracelet/jawbone_up2');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Jawbone UP 3","SECTION_PAGE_URL"=>'/gadgets/bracelet/jawbone_up3');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Jawbone Up MOVE","SECTION_PAGE_URL"=>'/gadgets/bracelet/jawbone_up_move');
                }
				
				if($arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]=='Браслеты Fitbit'){
					unset($arResult["SECTIONS"][$key][$skey][$sskey]); 
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Браслеты Fitbit","SECTION_PAGE_URL"=>'/gadgets/bracelet/fitbit');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Fitbit Charge","SECTION_PAGE_URL"=>'/gadgets/bracelet/fitbit/Fitbit_Charge');
	                 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Fitbit Charge HR","SECTION_PAGE_URL"=>'/gadgets/bracelet/fitbit/Fitbit_Charge_HR');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Fitbit Surge","SECTION_PAGE_URL"=>'/gadgets/bracelet/fitbit/Fitbit_Surge');
                }
				
				if($arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]=='Sony'){
					unset($arResult["SECTIONS"][$key][$skey][$sskey]); 
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Sony SmartWatch 3","SECTION_PAGE_URL"=>'/gadgets/watch/sony');
                }

				if($arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]=='Samsung'){
					unset($arResult["SECTIONS"][$key][$skey][$sskey]); 
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Samsung Gear","SECTION_PAGE_URL"=>'/gadgets/watch/samsung');
                }
				
				if($arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]=='GoPro'){
					unset($arResult["SECTIONS"][$key][$skey][$sskey]); 
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"GoPro Hero 4","SECTION_PAGE_URL"=>'/gadgets/sport/action_camera/GoPro');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"GoPro Hero 2014","SECTION_PAGE_URL"=>'/gadgets/sport/action_camera/GoPro_2014');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"GoPro Hero 3+","SECTION_PAGE_URL"=>'/gadgets/sport/action_camera/GoPro_3');
                }
				
				if($arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]=='OnePlus'){
					unset($arResult["SECTIONS"][$key][$skey][$sskey]); 
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"OnePlus One","SECTION_PAGE_URL"=>'/brands/OnePlus');
					 $arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"OnePlus 2 Two","SECTION_PAGE_URL"=>'/smartphones/oneplus_two');
					 /*временно*/$arResult["SECTIONS"][$key][$skey][]=array("NAME"=>"Asus ZenFone 2","SECTION_PAGE_URL"=>'/smartphones/other/asus');
                }
				
				
                if (count($arResult["SECTIONS"][$key][$skey]) == 0)
                    unset($arResult["SECTIONS"][$key][$skey]);
            }
        }
        if (count($arResult["SECTIONS"][$key]) == 0)
            unset($arResult["SECTIONS"][$key]);
    }
}

foreach($arResult["SECTIONS"]['TOP'] as $id => $v)
{
    $lastTop = $id;
}

//$arResult["SECTIONS"]['ADDITIONAL'][]=array("NAME"=>"iPhone 6 Plus","SECTION_PAGE_URL"=>'/iphone-6-Plus');
//var_dump($arResult["SECTIONS"]['CHILD'][$lastTop]);die;
$arResult["SECTIONS"]['CHILD'][$lastTop][]=array("NAME"=>"CarPlay","SECTION_PAGE_URL"=>'/carplay');
$arResult["SECTIONS"]['CHILD'][$lastTop][]=array("NAME"=>"GoPro Hero 4","SECTION_PAGE_URL"=>'/gadgets/sport/action_camera/GoPro');
$arResult["SECTIONS"]['CHILD'][$lastTop][]=array("NAME"=>"GoPro Hero 2014","SECTION_PAGE_URL"=>'/gadgets/sport/action_camera/GoPro_2014');
$arResult["SECTIONS"]['CHILD'][$lastTop][]=array("NAME"=>"GoPro Hero 3+","SECTION_PAGE_URL"=>'/gadgets/sport/action_camera/GoPro_3');
$arResult["SECTIONS"]['CHILD'][$lastTop][]=array("NAME"=>"DJI Phantom","SECTION_PAGE_URL"=>'/gadgets/DJI_copter');
$arResult["SECTIONS"]['CHILD'][$lastTop][]=array("NAME"=>"DJI Phantom 2 Vision+ 3.0","SECTION_PAGE_URL"=>'/gadgets/DJI_copter/DJI_Phantom_Vision_2');
$arResult["SECTIONS"]['CHILD'][$lastTop][]=array("NAME"=>"DJI Spreading","SECTION_PAGE_URL"=>'/gadgets/DJI_copter/DJI_Spreading');
$arResult["SECTIONS"]['CHILD'][$lastTop][]=array("NAME"=>"DJI Inspire 1","SECTION_PAGE_URL"=>'/gadgets/DJI_copter/DJI_Inspire_1');

?>
