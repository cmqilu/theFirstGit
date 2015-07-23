<?php 

	session_start();//必须放在最顶部
	
	
	
	$image = imagecreatetruecolor( 200, 60);//
	$bgcolor = imagecolorallocate( $image, 255, 255, 255 );//ffffff
	imagefill( $image, 0, 0, $bgcolor);
	
	/*for( $i=0;$i<4;$i++){
		$fontsize = 6;
		$fontcolor = imagecolorallocate( $image, rand(0,120), rand(0,120), rand(0,120));
		$fontcontent = rand(0,9);
		
		$x = ($i*100/4) + rand(5,10);
		$y = rand(5,10);
		
		imagestring( $image, $fontsize, $x, $y, $fontcontent, $fontcolor);
	}//随机产生4个数字
	*/ //与下面的for 选择其一
	
	
	
	$fontface = 'FZYTJW.TTF';
	
	$strdb = array('慕','课','网','赞','好','去','我','防','发','是','啊','为','器','有','图','和','将','快','看','网','玩','问','日','人','肉');
	/*header('content-type:text/html;charset=utf-8');
	var_dump($strdb);
	die();*/
	$captch_code = '';//保存验证内容
	for( $i=0; $i<4; $i++){
		$fontcolor = imagecolorallocate( $image, rand(0,120), rand(0,120), rand(0,120));
		
		$index = rand(0,count($strdb));

		$cn = $strdb[ $index ];
		//$captch_code .= $cn;
		$ic = iconv("gb2312","utf-8",$cn);
		$captch_code .= $ic;
		imagettftext( $image, mt_rand(20,24),mt_rand(-60,60),(40*$i+20),mt_rand(30,35),$fontcolor,$fontface,$ic);
		
	}//随机产生4个数字或字母

	$_SESSION['authcode'] = $captch_code;
	


	
	for( $i=0;$i<200;$i++){
		$pointcolor = imagecolorallocate( $image, rand(50,200), rand(50,200), rand(50,200));
		imagesetpixel( $image, rand(1,199), rand(1,59), $pointcolor);
	}//随机增加200个干扰点
	
	for( $i=0;$i<3;$i++){
		$linecolor = imagecolorallocate( $image, rand(80,220), rand(80,220), rand(80,220));
		imageline( $image, rand(1,199), rand(1,59), rand(1,199), rand(1,59), $linecolor);
	}//随机增加3条干扰线
	
	header( 'content-type: image/png' );//在输出图片之前一定要说明content-type
	imagepng( $image );
	
	
	//end
	imagedestroy( $image );
