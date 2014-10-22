<?php 
	require_once('string.help.php');

	/** 验证码函数
	 *  根据要显示的验证码的长度自动生成图片的宽度
	 */
	function verifyImage( $height,$str){
		$len = strlen($str);
		$width = 25*$len;
		$image = imagecreatetruecolor($width, $height);	
 		$white  =  imagecolorallocate ( $image ,  255 ,  255 ,  255 );
 		imagefilledrectangle($image, 1, 1, $width-2, $height-2, $white);
 		$font = '../fonts/ArnoPro-BoldItalicSmText.otf'; 
 		$size = 20;
 		for($i = 0; $i < $len; $i++){
 			$angle = mt_rand(-15,15);
 			$color = imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
 			$x = 4 + $i*mt_rand(22,25);
 			$y = 30;
 			imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $color);
 			imagefttext($image, $size, $angle, $x, $y, $color, $font, $str[$i]);
 		} 
		imagepng($image);
		header("content-type:image/png");
		imagedestroy($image);
	}
	/* 生成缩略图
     *@param scale 缩放比例 1为不缩放，默认值为0.5
     */
	function thumb($scale = 0.5){
		$src = imagecreatefromjpeg('Desert.jpg');
		list($width,$height) = getimagesize('Desert.jpg');
		$newWidth = $width*$scale;
		$newHeight = $height*$scale;
		$dst = imagecreatetruecolor($newWidth, $newHeight);
		imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
		header("content-type:image/jpg");
		imagejpeg($dst,'test.jpg');
	}
	/* 添加图片水印
	 *@param type 1为文字水印，2为图片水印，
	 *@param content 需要添加水印的资源文件
	 */
	function waterMark($type=1,$content = ''){
		$im = imagecreatefromjpeg('Desert.jpg');
		$color = imagecolorallocate($im, 200, 100, 50);
		list($width,$height) = getimagesize('water.jpg');
		$font = '../fonts/ArnoPro-BoldItalicSmText.otf'; 
		$src = imagecreatefromjpeg('water.jpg');
		if($type == 1){
			imagefttext($im, 20, 10,100, 300, $color, $font, $content);
		}
		if($type == 2){
			imagecopy($im, $src, 0, 0, 0, 0, $width, $height);
		}
		header("content-type:image/jpg");
		imagejpeg($im);
		imagedestroy($im);
	}

// $chars = buildRandomStr(3,6);
// verifyImage(50,$chars);
	// thumb(0.7);
	// waterMark(1,'test');
