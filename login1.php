<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'functions.php';
include "./connection.php";

	$config=read_config();
	$chain=@$_GET['chain'];

	//=$@$_GET['chain'];
	
	if (strlen($chain)){
		$name=@$config[$chain]['name'];
	
	$chain_name=@$config[$chain]['name'];
	}	
	else{
		$name='asd';
	}

echo $name;


set_multichain_chain($config[$chain]);

no_displayed_error_result($liststreams, multichain('liststreams', '*'));

foreach ($liststreams as $stre) {
	$rm_name=$stre['name'];

	no_displayed_error_result($liststreamitems, multichain('liststreamitems', $rm_name));
	foreach ($liststreamitems as $item) {
			$rm_usernamex=$item['key'];

			if($rm_usernamex=='name'){
				$rm_username = $item['data'];
				echo $rm_username;
			}

			echo "<br><br>";
		}	

}

?>
