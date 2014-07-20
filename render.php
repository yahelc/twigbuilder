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
			"name"=>"John Doe",
			"firstname"=>"John"
			),
		"cons" => array(),
		"consAddress" => array(),
		"consPhone" =>array(),
		"contribution"=>array(),
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
