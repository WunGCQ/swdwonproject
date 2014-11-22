<?php
	
	/*include("function.php");
	sendEmails();*/

    session_start(); 
    function random($len) 
    { 
        $srCStr="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
        $strs=""; 
        for($i=0;$i<$len;$i++)
        { 
            $strs.=$srCStr[mt_rand(0,35)]; 
        } 
        return $strs; 
    } 
    $str=random(4); //随机生成的字符串 
    $width = 50; //验证码图片的宽度 
    $height = 25; //验证码图片的高度 
    @header("Content-Type:image/png"); 
    $_SESSION["code"] = $str; 
    $im = imagecreate($width,$height); 
    //背景色 
    $back = imagecolorallocate($im,0xFF,0xFF,0xFF); 
    //模糊点颜色 
    $pix = imagecolorallocate($im,187,230,247); 
    //字体色 
    $font = imagecolorallocate($im,41,163,238); 
    //绘模糊作用的点 
    for($i=0;$i<1000;$i++) 
    { 
        imagesetpixel($im,mt_rand(0,$width),mt_rand(0,$height),$pix); 
    } 
    imagestring($im, 5, 7, 5,$str, $font); 
    imagerectangle($im,0,0,$width-1,$height-1,$font); 
    //imagepng($im,"./image/vcode.png");
    imagepng($im);
    imagedestroy($im); 
    $_SESSION["code"] = $str;

    echo $str;
    echo $_SESSION["code"]
?>