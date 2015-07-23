<?php 

	session_start();//必须放在最顶部
	
	
	
	$image = imagecreatetruecolor( 100, 30);//
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
	
	$captch_code = '';//保存验证内容
	for( $i=0; $i<4; $i++){
		$fontsize = 6;
		$fontcolor = imagecolorallocate( $image, rand(0,120), rand(0,120), rand(0,120));
		$data = 'abcdefghigkmnpqrstuvwxy3456789';
		$fontcontent = substr( $data, rand(0,strlen($data)), 1);
		$captch_code .= $fontcontent;//每生成一个随机 追加到captch_code中
		
		$x = ($i*100/4) + rand(5,10);
		$y = rand(5,10);
		
		imagestring( $image, $fontsize, $x, $y, $fontcontent, $fontcolor);
	}//随机产生4个数字与字母
	$_SESSION['authcode'] = $captch_code;
	
	for( $i=0;$i<200;$i++){
		$pointcolor = imagecolorallocate( $image, rand(50,200), rand(50,200), rand(50,200));
		imagesetpixel( $image, rand(1,99), rand(1,29), $pointcolor);
	}//随机增加200个干扰点
	
	for( $i=0;$i<3;$i++){
		$linecolor = imagecolorallocate( $image, rand(80,220), rand(80,220), rand(80,220));
		imageline( $image, rand(1,99), rand(1,29), rand(1,99), rand(1,29), $linecolor);
	}//随机增加3条干扰线
	
	header( 'content-type: image/png' );//在输出图片之前一定要说明content-type
	imagepng( $image );
	
	
	//end
	imagedestroy( $image );
