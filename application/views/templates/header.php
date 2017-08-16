<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php print isset($title) && !empty($title) ?  $title : "Signup";?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php print base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">
        <link href="<?php print base_url("assets/css/style.css");?>" rel="stylesheet">
        <link href="<?php print base_url("assets/css/reponsize.css");?>" rel="stylesheet">

        <?php if (isset($css_to_load) && $css_to_load != '') : ?>
            <?php foreach ($css_to_load as $row) :?>
                <link href="<?php print $row;?>" rel="stylesheet">
            <?php endforeach;?>
        <?php endif;?>
        
        <script src="<?php print base_url("assets/js/jquery.min.js");?>"></script>
        <script>
            var base_url = "<?php print base_url();?>";
        </script>
    </head>

    <?php
        $fetch_class = 'page-'.$this->router->fetch_class();
        $fetch_method = $this->router->fetch_method();
        $class= $fetch_class .' '.$fetch_method;
    ?>
    <body  class="<?php print $class?>">
   
    <div class="container">
