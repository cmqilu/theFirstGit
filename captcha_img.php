<?php
	
	header("content-type:text/html;charset=UTF-8");
	session_start();
	
	$table = array(
		'pic0' => '水母',
		'pic1' => '考拉',
		'pic2' => '企鹅',
		'pic3' => '花',
	);
	
	$index = rand( 0, 3);
	
	$value = $table['pic'.$index];

	$_SESSION['authcode'] = $value;
	
	$filename = dirname(__FILE__).'\\pic'.$index.'.jpg';
	$contents = file_get_contents( $filename );


	
	echo $contents;
	
