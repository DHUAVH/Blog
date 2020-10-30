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
        include("conn.php");

        $keyword = $_GET['keyword'];
        $query = "SELECT * FROM user Where title LIKE '%{$keyword}%'";
        
        $result = mysqli_query($link,$query);  
        if(!$result){
            echo mysqli_error($link);
        }
        
        if(!empty($keyword)){
        while($row = mysqli_fetch_array($result)){
            $row['title'] = str_replace($keyword,'<font color="red">'.$keyword.'</font>',$row['title']);
            ?>

            <div class="container">
                 
            </div> 
            <form role="form" class='border border-primary justify-content-center'>
                    <fieldset>
                        <span class="float-left"><a href="view.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></span>
                        <span class="float-right">发表时间：<?php echo $row['date']?></span>
                    </fieldset>
                </form> 

            <?php      
            }  
        }
    ?>
</body>
</html>
