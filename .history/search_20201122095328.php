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
        $query = "SELECT * FROM user Where title LIKE '%{$keyword}%' Limit 5";
        
        $result = mysqli_query($link,$query);  
        if(!$result){
            echo mysqli_error($link);
        }
        
        if(!empty($keyword)){
        while($row = mysqli_fetch_array($result)){
            $row['title'] = str_replace($keyword,'<font color="red">'.$keyword.'</font>',$row['title']);
            ?>
            
            <div class="container">                
                <div class="d-flex">
                    <div class="p-2"><a href="view.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></div>
                </div> 
            </div> 

            <?php      
            }  
        }
    ?>
</body>
</html>
