<?php

//ovu ovde if funkciju ukljucujemo samo zato sto index.php strana ne zeli da prikaze 
//lead-section.php i to je uvek problem sa ovim pluginom i ovako ga resavamo

if(is_home() && get_option('page_for_posts')){
    
      $leadSubtitle = get_field('lead_subtitle', get_option('page_for_posts'));
    $leadDescription = get_field('lead_description', get_option('page_for_posts'));
      $leadImage = get_the_post_thumbnail_url(get_option('page_for_posts'), 'full');
   
    
}else{
    $leadSubtitle = get_field('lead_subtitle');
$leadDescription = get_field('lead_description');

$leadImage = get_the_post_thumbnail_url(get_the_ID(), 'full');
// sa ovim smo setovali putanju do featured image (get_the_post_thumbnail_url()) na strani na kojoj se nalazimo (get_the_ID(),'full') 
}


?>




    <section class="lead-page-section" style="background-image: url(<?php echo $leadImage; ?>) ">

        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-9 col-md-8 col-lg-6 col-xl-5">
                    <article class="lead-section-content px-4 py-5 " data-animation="slide-right">
                        <h1 class="lead-section-title mb-4"><?php echo $leadSubtitle; ?></h1>
                        <p class="lead-section-description">
                            <?php echo $leadDescription; ?>
                        </p>
                    </article>
                </div>
            </div>
        </div>

    </section>