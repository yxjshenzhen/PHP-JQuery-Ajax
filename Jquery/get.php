<?php

	include("model/device.php");
	include("model/location.php");
	//set encoded
	header("Content-type: text/html; charset=utf-8");
	header("CONNECTION:close");
	
	//截取xxx.php后的url
	$str1 = substr($_SERVER['REQUEST_URI'],15);

	echo $str1;
	if($_SERVER['REQUEST_METHOD']=='GET'){
		if(substr($str1,1,6)=='device'){
			//echo "</br>";
			//echo "device";
			$device = new Device();
			
			$device->id =1;
			$device->userId = 1;
			$device->tags = "testTags1";
			$device->title = "testTitle1";
			$device->about = "testAbout1";
			$device->location = new Location();
			$device->location->local="深圳1";
			$device->location->longitude="深圳1";
			$device->location->latitude="深圳1";
			//echo $device->id;
			//echo $device->name;
			
			$device2 = new Device();
			
			$device2->id =2;
			$device2->userId = 1;
			$device2->tags = "testTags2";
			$device2->title = "testTitle2";
			$device2->about = "testAbout2";
			$device2->location = new Location();
			$device2->location->local="深圳2";
			$device2->location->longitude="深圳2";
			$device2->location->latitude="深圳2";
			
			$device3 = new Device();
			
			$device3->id =3;
			$device3->userId = 1;
			$device3->tags = "testTags3";
			$device3->title = "testTitle3";
			$device3->about = "testAbout3";
			$device3->location = new Location();
			$device3->location->local="深圳3";
			$device3->location->longitude="深圳3";
			$device3->location->latitude="深圳3";
			
			$device4 = new Device();
			
			$device4->id =4;
			$device4->userId = 1;
			$device4->tags = "testTags4";
			$device4->title = "testTitle4";
			$device4->about = "testAbout4";
			$device4->location = new Location();
			$device4->location->local="深圳4";
			$device4->location->longitude="深圳4";
			$device4->location->latitude="深圳4";
			
			$devices = array($device,$device2,$device3,$device4);
			
			print_r(decodeUnicode(json_encode($devices)));
			// echo $c->to_json();
		}
	}else if($_SERVER['REQUEST_METHOD']=='POST'){
		if(substr($str1,1,6)=='device'){
			$title=$_POST['title'];
			$about=$_POST['about'];
			//$title=$_POST['title'];
			//$title=$_POST['title'];
			
			$device = new Device();
			$device->title=$title;
			$device->about=$about;
			print_r(decodeUnicode(json_encode($device)));
		}
	}else if($_SERVER['REQUEST_METHOD']=='PUT'){
		echo "PUT";
		echo "</br>";
	}else if($_SERVER['REQUEST_METHOD']=='DELETE'){
		echo "DELETE";
		echo "</br>";
	}
	//unicode解码函数
	function decodeUnicode($str) { 
		return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', create_function('$matches', 'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");' ), $str); 
	}
	
	//echo "hello,php~";
	//echo $_POST["userName"];
	//echo $_POST["userPassword"];
	
	//http://www.blogjava.net/bluesky/archive/2005/12/26/25421.html
	
	//echo $_SERVER['REQUEST_METHOD'];
	//echo "</br>";
	
	//echo $_SERVER['REQUEST_URI'];
	//echo "</br>";
	//echo $_SERVER['HTTP_REFERER'];
	
	
	
?>