<?php
    include("navigation.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>search</title>
    <script src="js\search.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 input-group" style="margin-top: 40px;">
                <div class="input-group-prepend">
                    <label for="search"><i class="fa fa-search"></i></label>
                </div>        <!--弹性布局-->
                
                <input id="search" type="text" placeholder="输入关键词" onkeyup="showHint(this.value)">
                <div id="result"></div>
            </div>
        </div>     
    </div>
</body>
</html>

