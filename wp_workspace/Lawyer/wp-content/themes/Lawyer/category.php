<?php
get_header();
?>

<main>
    
    
    <?php
    
    $term = get_queried_object();
    $categoryImage = get_field('taxonomy_image', $term);
    
    ?>
    <section class="lead-page-section" style="background-image: url(<?php echo $categoryImage ?>) ">

        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-9 col-md-8 col-lg-6 col-xl-5">
                    <article class="lead-section-content px-4 py-5 " data-animation="slide-right">
                        <h1 class="lead-section-title text-uppercase mb-4">Category: <?php single_cat_title();  ?></h1>
                        <p class="lead-section-description">
                      <?php the_archive_description(' <p class="lead-section-description">','</p>') ?>
                        </p>
                    </article>
                </div>
            </div>
        </div>

    </section>
    
    <?php
get_template_part('/template-parts/posts-loop');
?>
    
</main>



<?php
get_footer();
?>
