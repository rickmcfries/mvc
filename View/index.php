<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/mainStyle.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/flaticon/font/flaticon.css">
    <title>Document</title>
</head>
<body>

    <?php require 'View/header.php';?>
    
    <div class="container">
        
        <?php require 'View/'.$view.'.php';?>

    </div>
    
    
    <?php require 'View/footer.php';?>    

</body>

</html>