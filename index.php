<?php
/**
 * Template for a homepage
 *
 * This template renders three last posts excerpts, info about socials (facebook, instagram), partners and quotes
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @category	Template
 * @since		1.0.0
 */
?>

<?php get_header(); ?>

    <div class="content-vertical-spacer"></div>

    <?php
        // Query post from news category
        $query = new WP_Query( array( 'category_name' => 'wydarzenia' ) );

        // Excibit post found
        $found_excibit = false;

        // Start the loop
        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

            global $post;

            if( get_post_meta( $post->ID, 'exhibit-meta-box-checkbox', true ) && $found_excibit != true ) {
                // Get and render posts excertps
                get_template_part( 'content', 'excibitbanner' );

                // Excibit were found so don't render another one
                $found_excibit = true;
            }

        endwhile; endif;

        wp_reset_postdata();
    ?>

    <div class="content-area row" data-equalizer data-options="equalizeByRow:true; equalizeOnStack:false">
        <div class="small-12 column">

            <?php
                // Query post from news category
                $query = new WP_Query( array( 'category_name' => 'aktualnosci', 'posts_per_page' => 3 ) );

                // Start the loop
                if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

                    // Get and render posts excertps
                    get_template_part( 'content', 'homecard' );

                endwhile; endif;

                wp_reset_postdata();
            ?>

        </div><!-- .small-12.column -->
    </div><!-- .content-area.row -->

    <div class="content-area row">

        <?php
            // Query post from news category
            $query = new WP_Query( array( 'category_name' => 'wydarzenia', 'posts_per_page' => 3 ) );

            // Start the loop
            if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

                // Get and render posts excertps
                get_template_part( 'content', 'banner' );

            endwhile; endif;

            wp_reset_postdata();
        ?>

    </div><!-- .content-area.row -->

<div class="tiny-line"></div>
<section class="social-media">
    <div class="insta-bg">
    <div class="bg-for-instagram-with-pictures"><?php echo do_shortcode("[instagradambg]"); ?></div>
<div class="row content-area">

    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
        <div class="fb-page pizda display-for-main-instagram column medium-6 large-4"
            data-href="https://www.facebook.com/wolominzhp/?fref=ts"
            data-tabs="timeline"
            data-height="340"
            data-small-header="true"
            data-adapt-container-width="true"
            data-hide-cover="true"
            data-show-facepile="true">
            <div class="fb-xfbml-parse-ignore">
                <blockquote cite="https://www.facebook.com/wolominzhp/?fref=ts">
                    <a href="https://www.facebook.com/wolominzhp/?fref=ts">Hufiec ZHP Wołomin</a>
                </blockquote>
            </div>
        </div>
        <div class="fb-page display-for-instagram column"
            data-href="https://www.facebook.com/wolominzhp/?fref=ts"
            data-tabs="false"
            data-height="340"
            data-small-header="true"
            data-adapt-container-width="true"
            data-hide-cover="true"
            data-show-facepile="true">
            <div class="fb-xfbml-parse-ignore">
                <blockquote cite="https://www.facebook.com/wolominzhp/?fref=ts">
                    <a href="https://www.facebook.com/wolominzhp/?fref=ts">Hufiec ZHP Wołomin</a>
                </blockquote>
            </div>
        </div>
    <div class="column medium-12 large-8">
        <div class="bg-for-instagram">
            <div class="small-offset-2 small-8 medium-offset-4 medium-4  end column">
                <img class="logo-instagram" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logos/Instagram.png">
            </div>
            <div class="owl-carousel column">
                <?php echo do_shortcode("[instagradam]"); ?>
            </div>
            <div class="small-offset-2 small-8 medium-offset-3 medium-6 large-offset-4 large-4 end column">
                <a href="https://www.instagram.com/zhp_wolomin/" target="_blank"><p class="instagram-button">Obserwuj nas &rsaquo;</p></a>
            </div>
        </div>
    </div>
</div>
</div>
</section>
    <section class="partners">
        <div class="tiny-line"></div>
        <div class="partners-content row content-area">
            <div class=" row">
                <div class="partners-text-content medium-7 large-7 column">
                    <h3>Partnerzy</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.<p>
                </div>
                <div class="partners-button-content text-center medium-5 large-5 column">
                    <a href="<?php echo get_permalink( get_option( 'additional_pages_partners_page_id' ) ) ?>"><h4 class="patners-button">Dowiedz się jak nas wspomóc &rsaquo;</h4></a>
                </div>
            </div>
            <div class="silder-for-logos">
                <div id="partners-carousel" class="owl-carousel">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logos/EJDK.png">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logos/MDK.png">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logos/OSP_Kobylka.png">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logos/WWL.png">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logos/MOK.png">
                </div>
            </div>
        </div>
    </section>
    <div class="tiny-line"></div>
    <section class="quotations">
        <div class="opacity-for-bg">
            <div class="row content-area">
                <div class="quotations-content small-12 text-center medium-5 large-3 column">
                    <div class="table-content">
                        <div class="picture-for-quotations column">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/faces/Robert_Baden-Powel.jpg">
                        </div>
                    </div>
                </div>
                <div class="quotations-content-silder small-12 medium-7 large-9 column">
                    <div class="table-content-slider row">
                        <div class="slide-with-quotation end column">
                            <p>Miłość jest "boską cząstką", która za­mie­szku­je w każdym z nas i jest właści­wie naszą duszą. Im więcej posługu­je się człowiek w sto­sun­ku do bliźnich cnotą miłości, tym bar­dziej roz­wi­ja i uszlachet­nia swoją duszę.</p>
                            <p>&#8212; Robert Boden-Powell</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
