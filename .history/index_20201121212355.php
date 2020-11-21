<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</head>
<body>

<?php
  session_start();
	include("conn.php");
	include("navigation.html");
  /* 分页结构：
   * 1.传入页码
   * 2.根据页码取出数据:php->mysql处理
   * 3.显示数据+分页条
   */
  
  /**1传入页码*/
  $page = isset($_GET['p'])? $_GET['p']:1;
  $pageSize = 5;
  $showPage = 5;
  /**2.根据页码取出数据:php->mysql处理 */

  /*设置数据库编码格式
  mysqli_query('SET NAMES UTF8')' */
  //编写sql获取分页数据 SELECT * FROM 表名 LIMIT 起始位置，显示条数
 
  $username = $_SESSION['user'];
  $sql = "SELECT * FROM user WHERE username='$username' and title is not null  LIMIT ".($page-1)*$pageSize.",{$pageSize}";
  
  //把sql语句传送数据中
  
  $result = mysqli_query($link,$sql);  
  if(!$result){
      echo mysqli_error($link);
  }
  
  //处理数据
  while($row = mysqli_fetch_array($result)){ //循环打印每一篇博客	
    ?>
    <div style="width: 740px; margin:0 auto">
       <form class="border border-secondary">
          <fieldset>
             <div style="float: left;"><a href="view.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></div>
             <div style="float: right;">发表时间：<?php echo $row['date']?></div>
             </fieldset>
      </form>
    </div>
          
    <?php
    }

  //获取数据总数
  $total_sql = "SELECT COUNT(*) FROM user WHERE username='$username'";
  $total_result = mysqli_fetch_array(mysqli_query($link,$total_sql));
  $total = $total_result[0];
  
  //计算页数
  $total_pages = ceil($total/$pageSize);
  
  /**3.显示数据+分页条 */
  $page_banner = "<div class='container'><ul class='pagination justify-content-center'>";
  //计算偏移量
  $pageoffset = ($showPage - 1)/2;
  if($page > 1){
      $page_banner .= "<li class='page-item'><a class='page-link' href='".$_SERVER['PHP_SELF']."?p=1'>首页</a></li>";
      $page_banner .= "<li class='page-item'><a class='page-link' href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'><上一页</a></li>";
  } else{
      $page_banner .= "<li class='page-item'><a class='page-link disable'>首页</a></li>";
      $page_banner .= "<li class='page-item'><a class='page-link disable'><上一页</a></li>";
  }
  //初始化数据
  $start = 1;
  $end = $total_pages;

  if($total_pages > $showPage){
      if($page > $pageoffset + 1){
          $page_banner .= "...";
      }

      if($page > $pageoffset){
          $start = $page - $pageoffset;
          $end = $total_pages > $page+$pageoffset ? $page + $pageoffset : $total_pages;
      } else{
          $start = 1;
          $end = $total_pages > $showPage ? $showPage : $total_pages;
      }

      if($page + $pageoffset > $total_pages){
          $start = $start - ($page + $pageoffset - $end);
      }
  }
  
  for($i=$start;$i<=$end;$i++){
      if($page == $i){
        $page_banner .= "<li class='page-item'><a class='page-link active'>{$i}</a></li>";
      } else{
          $page_banner .= "<li class='page-item'><a class='page-link active' href='".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a></li>";
      }  
  }

  //尾部省略
  if($total_pages > $showPage && $total_pages > $page + $pageoffset){
      $page_banner .="...";
  }

  if($page < $total_pages){
      $page_banner .= "<li class='page-item'><a class='page-link' href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页></a></li>";
      $page_banner .= "<li class='page-item'><a class='page-link' href='".$_SERVER['PHP_SELF']."?p=".($total_pages)."'>尾页</a></li>";
  }else{
    $page_banner .= "<li class='page-item'><a class='page-link disable'>尾页</a></li>";
    $page_banner .= "<li class='page-item'><a class='page-link disable'><上一页</a></li>";
}

  $page_banner .= "<form class='form-inline' action='index.php' method='GET'>";
  $page_banner .= "共{$total_pages}页,";
  $page_banner .= "到第<input type='text' size='2' name='p'>页";
  $page_banner .= "<input type='submit' value='确定'>";
  $page_banner .= "</form></div></div>";
  echo $page_banner;
?>

    
</body>
</html>