<?php
/**
 * Portfolio Page Template
*/
get_header(); 
    /**
     * Action before portfolios
    */
    do_action( 'rrtc_before_portfolios' ); ?>


</div><!-- .portfolio-holder -->
    
<?php

/**
 * Blog Section
 * 
 * @package JobScout
 */

$blog         = get_option('page_for_posts');
$ed_blog      = get_theme_mod('ed_blog', true);

$args = array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 8,
    'ignore_sticky_posts' => true
);

$qry = new WP_Query($args);

if ($ed_blog && $qry->have_posts()) { ?>
    <section id="blog-section" class="article-section"  style="margin-left: 10%;
    margin-right: 10%;">
        <div class="container">
           
            <?php if ($qry->have_posts()) { ?>
                <div class="article-wrap" id="list_new_view" style="
    margin-top: -5%;
">
                    <?php
                    while ($qry->have_posts()) {
                        $qry->the_post(); ?>
                        <article class="post">
                            <div class="row">
                                <div class="col-md-5">
                                    <figure class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('jobscout-blog', array('itemprop' => 'image'));
                                            } else {
                                                jobscout_fallback_svg_image('jobscout-blog');
                                            }
                                            ?>
                                        </a>
                                    </figure>
                                </div>
                                <div class="col-md-7">
                                <header class="entry-header">
                                        <h3 class="entry-title">
                                            <a class="text-title"href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="entry-content">
                                            <?php the_content(); ?>
                                        </div><!-- .entry-content -->
                                        <h4 class="read">
                                            <a class="font-text" href="<?php the_permalink(); ?>"> Read More</a>
                                        </h4>
                                    </header>
                               
                                </div>
                            </div>
                        </article>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div><!-- .article-wrap -->

              
            <?php } ?>
        </div>
    </section>
<?php
}

    
get_footer();