<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="search_container">
        <input id="search_input" name="search" type="text" placeholder="Residences..." autocomplete="off" class="text-center" onfocus="expandInput()" onblur="collapseInput()" style="font-size: small;">
        <button id="search_button" onfocus="expandInput()" onblur="collapseInput()">
            <i class="fa fa-search"></i>
        </button>
    </div>
    
</body>
</html>