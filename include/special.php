<?$queryMibok = false;
if(!empty($_SERVER['QUERY_STRING']))
	$queryMibok = $_SERVER['QUERY_STRING'];?>
<a href="<?if(!empty($queryMibok)) echo '?'.$queryMibok.'&special_version=Y'; else echo '?special_version=Y';?>">Версия для <br>слабовидящих</a>