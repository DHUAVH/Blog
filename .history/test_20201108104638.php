<?php
  session_start();
    include("conn.php");
include("menu.html");

  /**1传入页码*/
  $page = isset($_GET['p'])? $_GET['p']:1;
  $pageSize = 5;
  $showPage = 5;
  /**2.根据页码取出数据*/ 
  $username = $_SESSION['user'];
  $sql = "SELECT * FROM user WHERE username='$username' and title is not null  LIMIT ".($page-1)*$pageSize.",{$pageSize}";  
  $result = mysqli_query($link,$sql);  
  if(!$result){
      echo mysqli_error($link);
  }
  while($row = mysqli_fetch_array($result)){ //循环打印每一篇博客    
    ?>
    <div>
       <form class="center">
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
  $page_banner = "<div class='page'>";
  //计算偏移量
  $pageoffset = ($showPage - 1)/2;
  if($page > 1){
      $page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
      $page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'><上一页</a>";
  } else{
      $page_banner .= "<span class='disable'>首页</a></span>";
      $page_banner .= "<span class='disable'><上一页</a></span>";
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
        $page_banner .= "<span class='current'>{$i}</span>";
      } else{
          $page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
      }  
  }
  //尾部省略
  if($total_pages > $showPage && $total_pages > $page + $pageoffset){
      $page_banner .="...";
  }
  if($page < $total_pages){
      $page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页></a>";
      $page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".($total_pages)."'>尾页</a>";
  }else{
    $page_banner .= "<span class='disable'>首页</a></span>";
    $page_banner .= "<span class='disable'>上一页</a></span>";
}
  $page_banner .= "共{$total_pages}页,";
  $page_banner .= "<form action='index.php' method='GET'>";
  $page_banner .= "到第<input type='text' size='2' name='p'>页";
  $page_banner .= "<input type='submit' value='确定'>";
  $page_banner .= "</form></div>";
  echo $page_banner;
?>
<img src="images\logo.png" alt="">