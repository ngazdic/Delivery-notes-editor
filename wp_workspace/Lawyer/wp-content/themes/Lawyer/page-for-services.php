<?php

/* 
 * Template Name: Service Page
 */

get_header();

?>

<main>
    <?php
    get_template_part('/template-parts/lead-section');
    ?>
      <section class="service-section dark-service-section">
        <div class="container">
    
    <?php 
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            the_content();
        }
    }
    ?>
    
  
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-5">
                    <article class="service-item animation" data-animation="slide-top">
                        <a href="service-single.html" class="d-flex align-items-center mb-5">
                            <figure class="mb-0">
                                <img src="img/services/banking.png" alt=""/>
                            </figure>
                            <span class="text-uppercase h6 pl-4 text-white">BANKING AND FINANCE</span>
                        </a>
                        <p class="service-item-description text-white pr-4">
                            Our services, however, spread beyond legal support in business transactions.
                            Lawyer offers top of the line legal advice aiming to ensure the compliance 
                            of our clients’ operations with the regulations relevant to banking and finance. 
                        </p>
                        <a class="read-more text-primary text-uppercase" href="service-single.html">read more</a>
                    </article><!--.service-item end-->
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <article class="service-item animation" data-animation="slide-top">
                        <a href="service-single.html" class="d-flex align-items-center mb-5">
                            <figure class="mb-0">
                                <img src="img/services/ligitation.png" alt=""/>
                            </figure>
                            <span class="text-uppercase h6 pl-4 text-white">Litigation and Resolution</span>
                        </a>
                        <p class="service-item-description text-white pr-4">
                            A significant portion of Lawyer’s IP related
                            activities is related to the protection of ensure the compliance    
                        </p>
                        <a class="read-more text-primary text-uppercase" href="service-single.html">read more</a>
                    </article><!--.service-item end-->
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <article class="service-item animation" data-animation="slide-top">
                        <a href="service-single.html" class="d-flex align-items-center mb-4">
                            <figure class="mb-0">
                                <img src="img/services/portfolios.png" alt=""/>
                            </figure>
                            <span class="text-uppercase h6 pl-4 text-white">Distressed Portfolios</span>
                        </a>
                        <p class="service-item-description text-white pr-4">
                            Most of today’s large cross-border transactions involve
                            issues that are related to competition   
                        </p>
                        <a class="read-more text-primary text-uppercase" href="service-single.html">read more</a>
                    </article><!--.service-item end-->
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <article class="service-item animation" data-animation="slide-top">
                        <a href="service-single.html" class="d-flex align-items-center mb-4">
                            <figure class="mb-0">
                                <img src="img/services/regulatory.png" alt=""/>
                            </figure>
                            <span class="text-uppercase h6 pl-4 text-white">Regulatory and Compliance</span>
                        </a>
                        <p class="service-item-description text-white pr-4">
                            Our office provides an efficient top-tier collection services for local and
                            international clients using many years of experience of our
                            team members in representation of commercial banks in court
                            proceedings and out of court collections.
                        </p>
                        <a class="read-more text-primary text-uppercase" href="service-single.html">read more</a>
                    </article><!--.service-item end-->
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <article class="service-item animation" data-animation="slide-top">
                        <a href="service-single.html" class="d-flex align-items-center mb-4">
                            <figure class="mb-0">
                                <img src="img/services/employment.png" alt=""/>
                            </figure>
                            <span class="text-uppercase h6 pl-4 text-white">Employment</span>
                        </a>
                        <p class="service-item-description text-white pr-4">
                            Most of today’s large cross-border transactions involve issues that are 
                            related to competition law, which is why Lawyer considers
                            competition as an integral part of providing M&A and other services.
                        </p>
                        <a class="read-more text-primary text-uppercase" href="service-single.html">read more</a>
                    </article><!--.service-item end-->
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <article class="service-item animation" data-animation="slide-top">
                        <a href="service-single.html" class="d-flex align-items-center mb-4">
                            <figure class="mb-0">
                                <img src="img/services/corporate.png" alt=""/>
                            </figure>
                            <span class="text-uppercase h6 pl-4 text-white">M&A, Corporate and Commercial </span>
                        </a>
                        <p class="service-item-description text-white pr-4">
                            Our office provides an efficient top-tier collection services for local and
                            international clients using many years of experience of
                            our team members in representation of commercial banks
                            in court proceedings and out of court collections.
                        </p>
                        <a class="read-more text-primary text-uppercase" href="service-single.html">read more</a>
                    </article><!--.service-item end-->
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <article class="service-item animation" data-animation="slide-top">
                        <a href="service-single.html" class="d-flex align-items-center mb-4">
                            <figure class="mb-0">
                                <img src="img/services/real_estate.png" alt=""/>
                            </figure>
                            <span class="text-uppercase h6 pl-4 text-white">Real Estate</span>
                        </a>
                        <p class="service-item-description text-white pr-4">
                            Lawyer is assisting clients in coordinate domestic and international
                            services regarding M&A, service contracts,
                            severance payments, and confidentiality and restriction covenants.
                        </p>
                        <a class="read-more text-primary text-uppercase" href="service-single.html">read more</a>
                    </article><!--.service-item end-->
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <article class="service-item animation" data-animation="slide-top">
                        <a href="service-single.html" class="d-flex align-items-center mb-4">
                            <figure class="mb-0">
                                <img src="img/services/restucting.png" alt=""/>
                            </figure>
                            <span class="text-uppercase h6 pl-4 text-white">Restructuring and Insolvency</span>
                        </a>
                        <p class="service-item-description text-white pr-4">
                            In representation of commercial banks in court 
                            proceedings and out of court collections.
                        </p>
                        <a class="read-more text-primary text-uppercase" href="service-single.html">read more</a>
                    </article><!--.service-item end-->
                </div>
            </div><!-- .row end -->
        </div><!-- .container end -->
    </section><!-- .service-section end -->
</main>

<?php
get_footer();
?>