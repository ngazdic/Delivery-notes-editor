<?php get_header(); ?>

<main>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();

            $featureImage = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>

            <section class="lead-page-section news-page-section" style="background-image: url(<?php echo esc_url($featureImage); ?>)">

                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-9 col-md-8 col-lg-6">
                            <article class="lead-section-content px-4 py-5 " data-animation="slide-right">
                                <p class="text-primary mb-4">


                                    <?php
                                    $newsCategories = get_the_category(get_the_ID());
                                    //mi sa ovim gore dobijamo jedan objekat koji sadrizi vise podataka
                                    //ispod cemo preci petljom kroz taj objekat i izdvojiti sta nama treba
                                    //a to je ime. A ketogirju smo ovom postu dodelili preko WOrd Pres admin panela

                                    foreach ($newsCategories as $newsCategory) {
                                        ?>
                                        <a href='<?php echo get_category_link($newsCategory->term_id) ?>' class="category text-uppercase">

                                            <?php echo $newsCategory->name; ?>

                                        </a>
                                        <?php
                                    }
                                    ?>

                                    |
                                    <span class="date-published"><?php the_date('j.m.Y'); ?></span>
                                </p>
                                <h1 class="lead-section-title mb-4">
        <?php the_title(); ?>  
                                </h1>
                                <p class="lead-section-description">
        <?php the_excerpt(); ?> 
                                </p>
                            </article>
                        </div>
                    </div>
                </div>

            </section>

            <section class="news-single-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xl-8">
                            <article>
        <?php the_content(); ?>

                            </article>

                            <article class="news-tags">
                                <p class="text-primary tag-title">Tags:</p>
                                <div class="tags">

        <?php
        $newsTags = get_the_tags(get_the_ID());

        foreach ($newsTags as $newsTag) {
            ?>

            <a href='<?php echo get_tag_link($newsTag->term_id) ?>' class="btn btn-light text-primary px-4 py-2">

            <?php echo $newsTag->name; ?>

                                        </a>
                                            <?php
                                        }
                                        ?>

                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>

        <?php
    } // End while
} // End if
?>

</main>

    <?php get_footer(); ?>