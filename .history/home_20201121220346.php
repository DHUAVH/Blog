<?php
  session_start();
	include("conn.php");
    include("navigation.html");
    
    $query = "SELECT * FROM user"
?>

<!DOCTYPE html>
<html>
<head>
  <title>index</title>
<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>
</head>
<body>
<div id="index" class="carousel slide" data-ride="carousel">
    
    <!-- 指示符 -->
    <ul class="carousel-indicators">
        <li data-target="#index" data-slide-to="0" class="active"></li>
        <li data-target="#index" data-slide-to="1"></li>
        <li data-target="#index" data-slide-to="2"></li>
    </ul>
    
    <!-- 轮播图片 -->
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="images\1.jpg">
        <div class="carousel-caption">
            <h3>第一张图片描述标题</h3>
            <p>描述文字!</p>
        </div>

        </div>
        <div class="carousel-item">
        <img src="images\2.jpg">
        <div class="carousel-caption">
            <h3>第二张图片描述标题</h3>
            <p>描述文字!</p>
        </div>

        </div>
        <div class="carousel-item">
        <img src="images\3.jpg">
        <div class="carousel-caption">
            <h3>第三张图片描述标题</h3>
            <p>描述文字!</p>
        </div>
        </div>
    </div>
    
    <!-- 左右切换按钮 -->
    <a class="carousel-control-prev" href="#index" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#index" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
    
    </div>
</div>
    

</body>
</html>
