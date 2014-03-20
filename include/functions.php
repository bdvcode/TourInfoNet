<?
global  $urlLang;
$urli = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$text = explode("/", htmlspecialchars($urli));
$urlLang = next($text);
if($urlLang=="ru"){
	echo("Yarr!");
}
echo($urlLang);

?>