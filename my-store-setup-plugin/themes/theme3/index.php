<?php

/*
* this tamplate is for displaying the header
*/

?>


<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no-js">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="header_area" class="<?php echo get_theme_mod('gk_menu_position'); ?>">
        <div class="container">
            <div class="row" style="display: flex; justify-content: space-between">
                <div class="col-md-3 ">
                    <a href="<?php echo home_url(); ?>  "><img class="header-logo" src="<?php echo get_theme_mod('gk_logo'); ?> " alt=""></a>
                </div>
                <div class="col-md-9">
                    <?php wp_nav_menu(array('theme_location' => 'main_menu', 'menu_id' => 'nav')); ?>
                </div>
            </div>
        </div>
    </header>

    <section id="body_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>


    <footer id="footer_area">
        <section id="copyright_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p><?php echo get_theme_mod('gk_copyright_section'); ?></p>
                    </div>
                </div>
            </div>
        </section>
    </footer>


    <?php wp_footer(); ?>
</body>

</html>