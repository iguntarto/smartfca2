<?php
	
	echo getenv('COMPUTERNAME');
	echo '<br>';
    
	echo getenv('REMOTE_ADDR');
	echo '<br>';
		
	echo php_uname(getenv('REMOTE_ADDR'));
    echo '<br>';
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$hostname = gethostbyaddr($ip);
	
	//$hostname = gethostname();
	echo $hostname;
	echo '<br>------';
	
	echo php_uname($_SERVER['REMOTE_ADDR']);
	echo '<br>';
	
	echo '<br>';
	echo '---------------------------------------------------------------------------------------------------------------------------';
	echo '<br>';
	
	function getGUID(){
		if (function_exists('com_create_guid')){
			return com_create_guid();
		}else{
			mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			$uuid = //chr(123)// "{"
				//.
				 substr($charid, 0, 8)//.$hyphen
				.substr($charid, 8, 4)//.$hyphen
				.substr($charid,12, 4)//.$hyphen
				.substr($charid,16, 4)//.$hyphen
				.substr($charid,20,12)
				//.chr(125);// "}"
				;
			return $uuid;
		}
	}
	
	$GUID = getGUID();
	echo $GUID;

	echo '<br>';
	echo $charid = strtoupper(md5(uniqid(rand(), true)));
	echo '<br>';
	echo '---------------------------------------------------------------------------------------------------------------------------';
	echo '<br>';

// get an IP address
$ip = $_SERVER['REMOTE_ADDR'];
//$ip = $_SERVER['HOST_NAME'];
// display it back
echo "<h2>Client IP Demo</h2>";
echo "Your IP address : " . $ip;
echo "<br>Your hostname : ". gethostbyaddr($ip) ;
	
	echo '<br>';
	echo '---------------------------------------------------------------------------------------------------------------------------';
	echo '<br>';
	
$ip = getenv("REMOTE_ADDR") ;
echo "Your IP Address Is : <b><u>$ip</u></b> ";
?></br>
[
<?php
GetHostByName('REMOTE_ADDR');
echo php_uname();
?>
]
</br>
[
<?php
function getip() {
if (isSet($_SERVER)) {
if (isSet($_SERVER["HTTP_X_FORWARDED_FOR"])) {
$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
} elseif (isSet($_SERVER["HTTP_CLIENT_IP"])) {
$realip = $_SERVER["HTTP_CLIENT_IP"];
} else {
$realip = $_SERVER["REMOTE_ADDR"];
}
} else {
if ( getenv( 'HTTP_X_FORWARDED_FOR' ) ) {
$realip = getenv( 'HTTP_X_FORWARDED_FOR' );
} elseif ( getenv( 'HTTP_CLIENT_IP' ) ) {
$realip = getenv( 'HTTP_CLIENT_IP' );
} else {
$realip = getenv( 'REMOTE_ADDR' );
}
}
return $realip;
}

//print out the ip and browser information

echo $_SERVER["HTTP_USER_AGENT"]
	
?>