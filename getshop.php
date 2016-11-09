<?php

require("include/html.inc");

$shops = array( "", array(4238 => 5000, 4239 => 5000, 4240 => 5000, 4241 => 5000, 4242 => 5000, 4243 => 5000, 4244 => 5000, 4245 => 5000),
					array(4148 => 450, 4154 => 1000, 4150 => 2000, 4151 => 2000, 4153 => 2000, 5418 => 2000, 5328 => 2000, 5358 => 2000, 5356 => 5000, 4202 => 25000, 5876 => 25000, 5877 => 25000, 5878 => 25000, 5879 => 25000, 5880 => 25000),
					array(4271 => 1000, 4574 => 2000, 4575 => 3000, 4588 => 5000, 5167 => 10000, 4266 => 8000, 5687 => 799, 5561 => 799, 4270 => 999, 5944 => 2000, 5932 => 1600, 4424 => 1100, 4422 => 499),
					array(605 => 499, 1021 => 499, 1020 => 499, 4165 => 1000, 4164 => 1000, 5362 => 2000, 5417 => 9999, 5319 => 9999, 5314 => 5000, 5867 => 20000, 5868 => 25000, 5869 => 25000, 1022 => 5000),
					array(5717 => 1, 5639 => 5000, 5640 => 5000, 5641 => 5000, 265 => 10000, 266 => 10000, 267 => 10000, 268 => 10000, 269 => 10000, 1255 => 500000, 1256 => 500000, 1257 => 500000, 1258 => 500000, 1259 => 500000, 1260 => 500000),
					array(272 => 20000, 273 => 20000, 274 => 20000, 275 => 20000, 276 => 20000, 18912 => 20000, 18913 => 20000, 18563 => 20000, 18545 => 20000, 18464 => 20000, 1550 => 50000, 1261 => 500000),
					array(14657 => 20000, 1262 => 500000),
					"", "",
					array(16678 => 50000, 12511 => 100000, 12638 => 100000, 13961 => 100000, 14214 => 100000, 14089 => 100000, 17478 => 50000, 12512 => 100000, 12639 => 100000, 13962 => 100000, 14215 => 100000, 14090 => 100000, 17422 => 50000, 13855 => 100000, 12640 => 100000, 13963 => 100000, 14216 => 100000, 14091 => 100000, 17423 => 50000, 13856 => 100000, 12641 => 100000, 13964 => 100000, 14217 => 100000, 14092 => 100000, 16829 => 50000, 12513 => 100000, 12642 => 100000, 13965 => 100000, 14218 => 100000, 14093 => 100000, 16764 => 50000, 12514 => 100000, 12643 => 100000, 13966 => 100000, 14219 => 100000, 14094 => 100000, 17643 => 50000, 12515 => 100000, 12644 => 100000, 13967 => 100000, 14220 => 100000, 14095 => 100000, 16798 => 50000, 12516 => 100000, 12645 => 100000, 13968 => 100000, 14221 => 100000, 14096 => 100000, 16680 => 50000, 12517 => 100000, 12646 => 100000, 13969 => 100000, 14222 => 100000, 14097 => 100000, 16766 => 50000, 13857 => 100000, 12647 => 100000, 13970 => 100000, 14223 => 100000, 14098 => 100000, 17188 => 50000, 12518 => 100000, 12648 => 100000, 13971 => 100000, 14224 => 100000, 14099 => 100000, 17812 => 50000, 13868 => 100000, 13781 => 100000, 13972 => 100000, 14225 => 100000, 14100 => 100000, 17771 => 25000, 17772 => 25000, 13869 => 100000, 13782 => 100000, 13973 => 100000, 14226 => 100000, 14101 => 100000, 16887 => 50000, 12519 => 100000, 12649 => 100000, 13974 => 100000, 14227 => 100000, 14102 => 100000, 17532 => 50000, 12520 => 100000, 12650 => 100000, 13975 => 100000, 14228 => 100000, 14103 => 100000, 14625 => 1000000, 17717 => 50000, 15265 => 100000, 14521 => 100000, 14928 => 100000, 15600 => 100000, 15684 => 100000, 18702 => 50000, 15266 => 100000, 14522 => 100000, 14929 => 100000, 15601 => 100000, 15685 => 100000, 17737 => 500000, 17858 => 50000, 15267 => 100000, 14523 => 100000, 14930 => 100000, 15602 => 100000, 15686 => 100000, 19203 => 50000, 16138 => 100000, 14578 => 100000, 15002 => 100000, 15659 => 100000, 15746 => 100000, 16139 => 100000, 14579 => 100000, 15003 => 100000, 15660 => 100000, 15747 => 100000, 6058 => 50000, 16140 => 100000, 14580 => 100000, 15004 => 100000, 16311 => 100000, 15748 => 100000)
		      );

$compiled = array();
if (isset($_GET['id'])) {
	$shopid = $_GET['id'];
	$compiled["category"] = $shopid;


	$items = array();
	$count = 0;
	foreach($shops[$shopid] as $itemid => $price) {
	//while($item = $tmp->fetch_assoc()) {
		$items[$count]["itemid"] = $itemid;
		$name = ucwords(sqlQuery("SELECT realname FROM `item_info` WHERE itemid = ".$itemid)["realname"]);
		/*$name = str_replace("_", " ", $item["name"]);
		$name = mb_eregi_replace('\bM{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})\b', "strtoupper('\\0')", $name, 'e');*/
		$name = str_replace("The", "the", str_replace("Of", "of", $name));
		$items[$count]["itemname"] = $name;
		$stackSize = intval(sqlQuery("SELECT stackSize FROM `item_basic` WHERE itemId = ".$itemid)["stackSize"]);
		$items[$count]["stack"] = $stackSize;
		//$level = intval(sqlQuery("SELECT level FROM `item_armor` WHERE itemId = ".$itemid)["level"]);
		//if (!isset($level))
		//	$level = 0;
		//$items[$count]["level"] = $level;
		$stacked = 0;
		//if ($stackSize > 1)
		//	$stacked = 1;
		//$price = sqlQuery("SELECT price FROM `auction_house` WHERE itemid = ".$itemid." AND seller_name = 'DarkStar' AND buyer_name = 'DarkStar' AND stack = ".$stacked)["price"];
		//if (!isset($price))
			//$price = "0";
		$items[$count]["price"] = number_format($price);
		//$instock = sqlQuery("SELECT COUNT(*) FROM `auction_house` WHERE itemid = ".$itemid." AND seller_name = 'DarkStar' AND buyer_name IS NULL")["COUNT(*)"];
		$items[$count]["instock"] = "&infin;";
		$count++;
	}
  $compiled["items"] = $items;
}

$json = json_encode($compiled);
echo $json;

?>