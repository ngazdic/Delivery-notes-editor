  <footer class="bg-white">
            <div class="container text-center d-sm-flex justify-content-sm-between align-items-sm-center">
                
            <?php
        // Get the social menu ID
        $menuLocations = get_nav_menu_locations();
        $socialMenuID = $menuLocations['social'];

        // Get the social menu items
        $socialMenuItems =wp_get_nav_menu_items($socialMenuID);

      
        ?>
        
    <nav class="social mb-4 mb-sm-0 order-sm-last">
    <?php
    // Display social menu items
    foreach ($socialMenuItems as $socialMenuItem) {
        if ($socialMenuItem->menu_item_parent == 0) { // Only top-level items
            $class = 'fab fa-' . strtolower($socialMenuItem->title);//konkatenacija klase i title-a
            if (strtolower($socialMenuItem->title) == 'facebook') {//ako je title facebook dodaj mu i -f
                $class .= '-f';
            }
            ?>
            <a href="<?php echo $socialMenuItem->url; ?>" class="<?php echo $class; ?>"></a>
            <?php
        }
    }
    ?>
</nav>
              <!--  <nav class="social mb-4 mb-sm-0 order-sm-last">
                    <a href="https://facebook.com" class="fab fa-facebook-f"></a>
                    <a href="https://twitter.com" class="fab fa-twitter"></a>
                    <a href="https://instagram.com" class="fab fa-instagram"></a>
                </nav>  -->
                
                <p class="copyright mb-0">Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo home_url() ?>"><?php bloginfo('name') ?></a></p>
            </div>
        </footer><!--footer end-->


        
        <?php
//ova funkcija ispod ukljucuje defalut wordpress sytle
wp_footer(); ?>
    </body>
</html>