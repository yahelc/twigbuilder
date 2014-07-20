<?php
require('Twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();


$loader = new Twig_Loader_String();
$twig = new Twig_Environment($loader);

function Twig_lte($a, $b){
   return $a<=$b;
}
function Twig_gte($a, $b){
   return $a>=$b;
}
function Twig_lt($a, $b){
   return $a<$b;
}
function Twig_gt($a, $b){
   return $a>$b;
}

    $twig->addFunction('lt', new Twig_Function_Function('Twig_lt'));
    $twig->addFunction('lte', new Twig_Function_Function('Twig_lte'));
    $twig->addFunction('gt', new Twig_Function_Function('Twig_gt'));
    $twig->addFunction('gte', new Twig_Function_Function('Twig_gte'));
	$twig->addFilter(new Twig_SimpleFilter("base64", "base64_encode"));

$variables = array();
if($_POST["personalized"] === "true"){
	$variables = array(
		"recipient" => array(
			"name"=>"John Samuels Doe",
			"firstname"=>"John",
			"lastname" => "Doe",
			"email" => "john.doe@example.com",
			"obfuscatedrecipientid" =>"23hii",
			"obfuscatedconsid" =>"weohe",
			"recipientkey" => "duohd3",
			"cons" => 11299113,
			"zip" =>"90210",
			"hasSavedPaymentInfo" =>true,
			"unsubscribe" => "http://blah/page/unsubscribe"
			
			),
		"cons" => array(
			"name"=>"John Samuels Doe",
			"firstname"=>"John",
			"lastname"=>"Doe",
			"middlename"=>"Samuels",
			"gender"=>"Male",
			"prefix"=>"Mr.",
			"employer"=>"Acme Inc.",
			"occupation"=>"Salesman",
			),
		"consAddress" => array(
			"state_abbr"=>"CA",
			"state_name"=>"California",
			"city"=>"Beverly Hills",
			"zip"=>"90210",
			"country"=>"USA",
			),
		"consPhone" =>array(
			"homephone"=>"555-555-5555",
			"workphone"=>"800-555-5555",
			"fax"=>"",
			"mobilephone"=>"347-555-555",
			),
		"contribution"=>array(
			"highestprevcontribraw"=> 95.00,
			"highestprevcontribraw"=> "$95.00"	
			
		),
		"guid" =>"12314o8honbuk13b"	
		
	);
}

try{
	$template = $twig->loadTemplate($_POST["template"]);
	
	echo $template->render($variables, true);
	
}
catch(Exception $e){
	echo "<error/><script>window.setError &&  window.setError(" . json_encode($e->getMessage()) . ")</script>";
}
?>
