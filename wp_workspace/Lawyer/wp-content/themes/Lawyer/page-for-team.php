<?php
/*
 * Template Name: Page for Team
 */

get_header();
?>

<main>
    <?php
    get_template_part('/template-parts/lead-section');
    ?>

    <section class="team-members">
        <div class="container">
            <h2 class="text-center mb-5">
                <?php
                if (have_posts()) {
                    the_post();
                    the_content();
                }
                ?>
            </h2>
            
            <?php
            $args = array(
                // Provide arguments to query the database and return the required posts
                'posts_per_page' => -1, // This will retrieve all posts
                'post_type' => 'team_members', // This is directly linked to the database column post_type to get data
                'order' => 'ASC',
                'orderby' => 'title'
            );

            $members = new WP_Query($args); // Function to communicate with the database
            
            if ($members->have_posts()) {
                ?>
                <div class='row'>
                    <?php
                    while ($members->have_posts()) {
                        $members->the_post();
                        ?>
                        <div class="col-12 col-xm-6 col-md-4 col-lg-3 mb-4">
                            <article class="team-member">
                                <figure class="position-relative">
                                    <a href="<?php the_permalink(); ?>" class="d-block">
                                        <?php the_post_thumbnail('team-list'); ?>
                                    </a>
                                    <a href="<?php the_field('member_linkedin'); ?>" class="fab fa-linkedin-in"></a>
                                </figure>
                                <h5>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h5>
                                <p class="team-member-position"><?php the_field('member_position'); ?></p>
                            </article>
                        </div><!-- .col member end -->
                        <?php
                    }
                    ?>
                </div>
                <?php
            } else {
                ?>
                <div class='jumbotron'>
                    <h2>There are no members to show</h2>
                </div>
                <?php
            }

            wp_reset_postdata(); // Important to execute at the end
            ?>
        </div><!-- .container end -->
    </section><!-- .team-members end -->

    <?php
    get_template_part('/template-parts/info-section');
    ?>
</main>

<?php
get_footer();
?>