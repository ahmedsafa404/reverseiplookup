<?php
echo "

  _____ _____    _                 _                
 |_   _|  __ \  | |               | |               
   | | | |__) | | |     ___   ___ | | ___   _ _ __  
   | | |  ___/  | |    / _ \ / _ \| |/ / | | | '_ \ 
  _| |_| |      | |___| (_) | (_) |   <| |_| | |_) |
 |_____|_|      |______\___/ \___/|_|\_\\__,_| .__/ 
                                             | |    
                                             |_|    
				
				@Toxic Inj3ct0r
";
echo "\n\n";
$ip = readline("Enter Target IP or Domain : ");

$curl = curl_init();

$api = "http://domains.yougetsignal.com/domains.php";

curl_setopt($curl, CURLOPT_URL,$api);
curl_setopt($curl, CURLOPT_POST,true);
curl_setopt($curl, CURLOPT_POSTFIELDS, "remoteAddress=$ip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$get = curl_exec($curl);
curl_close ($curl);

$getDomain = $get;

$domain = json_decode($getDomain);

echo "\n";
echo "Total Domain found : ".$domain->domainCount.PHP_EOL;
echo "IP Address : ".$domain->remoteIpAddress.PHP_EOL;

echo "\n";

$totalDomain = count($domain->domainArray);

for($i=0;$i<$totalDomain;$i++)
{
	echo "[+] ".$domain->domainArray[$i][0]."\n";
}




?>