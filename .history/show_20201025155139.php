<?php
    include("navigation.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="search.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <label for="search">搜索</label>
                <input id="search" type="text" placeholder="输入关键词" onkeyup="showHint(this.value)">
                <div id="result"></div>
            </div>
        </div>     
    </div>
</body>
</html>

