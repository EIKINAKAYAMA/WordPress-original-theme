<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo get_template_directory_uri();?>/asset/css/style.css" rel="stylesheet" type="text/css" media="all"/> <!-- base css  -->
    <link href="<?php echo get_template_directory_uri();?>/style.css" rel="stylesheet" type="text/css" media="all"/> <!-- compiled css by scss -->

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script async src="<?php echo get_template_directory_uri();?>/asset/js/drop-down-menu.js"></script>
    <?php wp_head();?>
</head>
<body>
    <div id="container">
        <header id="container__left">
            
            <div id = header-main>

                <div id="header-main__logo">
                    <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                    <img src="<?php echo get_template_directory_uri();?>/asset/images/logo.png">
                </div>
                
                <!-- All setted in function.php by register_my_menus -->
                <div id="header-main__SNS">
                    <?php get_sidebar(); ?>
                </div>
    
                <!-- All setted in function.php by register_my_menus -->
                <div id="header-main__menu">
                    <nav class="smanone clearfix">
                        <?php 
                            wp_nav_menu( array( 
                                'container' => false,
                                'items_wrap' => '<ul id="menu">%3$s</ul>',
                            ) ); 
                        ?>
                    </nav>
                </div>
            </div>
            <?php get_sidebar('second'); ?>
        </header>