<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="<?php bloginfo('language');//dinamicki ispisujemo jezik ?>">
    <head>
        <title><?php
            bloginfo('name'); //dinamicki dodajemo ime sajta
            wp_title(' | ', true, 'left')//dodajemo separator | sa leve strane, u tab, i dodajemo ime svake strane 
            //npr lawyer | single page itd (ovo je moguce uz pomoc funkcije add_theme_support('title-tag'););
            ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Vladan Dzulovic">
        <meta name="description" content="Lawyer is a specialized commercial law firm based in Belgrade, Serbia, firmly committed to providing advice at the highest level and achieving lasting results for our clients.">
        <meta name="keywords" content="Lawyer, law, Belgrade, company, clients">


        <!--ios compatibility-->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/frontend/apple-icon-144x144.png">


        <!--Android compatibility-->

        <meta name="mobile-web-app-capable" content="yes">
        <meta name="application-name" content="<?php bloginfo('name'); ?>">
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/frontend/android-icon-192x192.png">




        <?php
//ova funkcija ispod ukljucuje defalut wordpress sytle
        wp_head();
        ?>

    </head>
    <body <?php
        body_class(); //ispisuju se neke klase, i zgodno nam je jer kad smo ulogovani preko admin panela
        //imamo klasu logged-in a kad nismo nemamo i onda mozemo u style.css da dodamo marginu na da bi odvojili body od
        //admin panela kad smo ulogovani da se nav bar tada ne bi preklapao
        ?>>


        <header class="fixed-top bg-white py-2 py-xl-4">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light ">
                    <?php
                    if (has_custom_logo()) {

                        the_custom_logo();
                    } else {
                        ?>
                        <a class="navbar-brand" href="<?php echo home_url(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/frontend/img/logo.png" alt=""/>
                        </a>
                        <?php
                    }
                    ?>

                    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <div class="collapse navbar-collapse" id="main-menu">
                   
                        
                        
                        
                           <?php 
                $menuLocation = get_nav_menu_locations(); // Get menu locations, znaci koje sve menu imas: main i social
                $mainMenuID = $menuLocation['main-menu']; // Get the main menu ID - izaberes main
                $topMenuItems = wp_get_nav_menu_items($mainMenuID); // Get the menu items - izaberes sve ono sto main sadrzi, dobijes jedan array 

                if ($topMenuItems) { ?>
                <ul class="navbar-nav ml-auto">
                    <?php 
                    foreach ($topMenuItems as $topMenuItem) {
                        
                        //active class
                        $active_class=''; // aktivna klasa koju smo definisali
                                
                                if($topMenuItem->url == get_permalink()){//ako je top menu url jedak sa urlom strane na kojoj smo
                                    
                                       $active_class='active';
                                    
                                }
                        
                        //top level menu
                        if ($topMenuItem->menu_item_parent == 0) { // svaki li ima 0 za parenta ako je deo main menu 
                            //sa ovim mi pravimo pod menije od nekih lijeva, meni u meniju
                            $topItemID = $topMenuItem->ID;
                            $submenuItems = array();
                            
                            foreach($topMenuItems as $submenuItem){
                                
                                if($submenuItem->menu_item_parent == $topItemID){
                                    
                                    $submenuItems[] = $submenuItem;
                                    //active class
                                    
                                    if($submenuItem->url == get_permalink()){
                                        
                                        $active_class='active';
                                    }
                                }
                            }
                            
                            ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $active_class; ?>" href="<?php echo $topMenuItem->url; ?>">
                                <?php echo $topMenuItem->title; ?>
                                <span class="sr-only">(current)</span>
                            </a>
                            
                        <?php if(!empty($submenuItems)){ ?>
                            <ul class='submenu'>
                                <?php
                                foreach($submenuItems as $subitem){ ?>
                                
                                <li>
                                    <a href ='<?php echo $subitem->url; ?>'><?php echo $subitem->title; ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                            
                        <?php } ?>
                        </li>
                        <?php } 
                    } ?>
                </ul>
                <?php } ?>
   
                        
                        
                        
                        
                        
                        
                        <!-- 
                    
                    php za menu koji je preporucljiv, a ako imamo depth odradimo ga preko html i cssa
                   ?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'menu_class' => 'navbar-nav ml-auto',
                            'container' => ''//Removed container by setting
                            // it to an empty string to avoid wrapping the menu in any additional HTML tags.
                        ));
                        ?>


                        <!-- <ul class="navbar-nav ml-auto">
                             <li class="nav-item ">
                                 <a class="nav-link" href="services.html">Services <span class="sr-only">(current)</span></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="team.html">Our Team</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="about.html">About Us</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="news.html">News</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="contact.html">Contact</a>
                             </li>
                             
                         </ul>
                         comment -->
                    </div>
                </nav>
            </div><!--.container end-->
        </header><!--header end-->
