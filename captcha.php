<?php
  session_start();

  $image = imagecreatetruecolor(100,30);
  $bgcolor = imagecolorallocate($image,200,200,200);
  imagefill($image,0,0,$bgcolor);

  //验证码内容 
  $captcha_code = '';
  for($i=0;$i<4;$i++){
      $fontsize = 5;
      $x = ($i*100 / 4) + rand(5,10);
      $y = rand(5,10);
      $data = 'abcdefghkmnprstuvwx345678';
      $str = $data[rand(0,strlen($data))];
      $captcha_code .= $str;
      $fontcolor = imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
      imagestring($image,$fontsize,$x,$y,$str,$fontcolor);    
  }

  $_SESSION['authcode'] = $captcha_code;

  //增加点干扰元素
  for($i=0;$i<200;$i++){
      $pointcolor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
      imagesetpixel($image,rand(1,99),rand(1,29),$pointcolor);
  }

  //增加线干扰元素
  for($i=0;$i<4;$i++){
      $linecolor = imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));
      imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$linecolor);
  }


  header('content-type:image/png');    //输出图片的信息
  imagepng($image);   //输出图片

  imagedestroy($image);
?>