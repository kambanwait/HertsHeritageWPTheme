<?php
/*
  Template Name: Contact Us Page
*/
?>
<?php get_header(); ?>

	<div id="inner-content" class="wrap cf page">

		<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <!-- fixed large image -->
                    <section class="entry-content cf fixedImage" itemprop="articleBody" >
                        <!-- :D RWD SRCSET :D -->
                        <?php
                            $imageId    = get_field('contact_us_1st_block_image');
                            $img_src    = wp_get_attachment_image_url( $imageId, 'blog-small' );
                            $img_srcset = wp_get_attachment_image_srcset( $imageId, 'blog-small' );
                        ?>
                        <img src="<?php echo esc_url( $img_src ); ?>" srcset="<?php echo esc_attr( $img_srcset ); ?>" sizes="" alt="" class="blockImage" />

                        <h1 class="h1"><?php echo get_the_title(); ?></h1>
                        <!-- downArrow -->
                        <img id="downArrow" src="<?php echo get_bloginfo('template_directory');?>/library/images/downArrow.png" width="47" height="17" />
                    </section>

                    <!-- Block 1 -->
                    <section class="entry-content cf blockOne" itemprop="articleBody" >
                        <div class="section-wrapper">
                            <div class="text">
                                <?php the_field('contact_us_page_1st_block_text') ?>
                            </div>
                        </div>
                    </section>

                    <!-- Tabbed Contact Forms -->
                    <section class="entry-content cf blockTwo backgroundColor" itemprop="articleBody" >
                        <div class="section-wrapper">

                        <div class="tabs">
                            <span class="customersFormTab">
                                <a href="#" rel="customersForm" class="open" data-color="green" >customers</a>
                            </span>
                            <span class="contractorsFormTab">
                                <a href="#" rel="contractorsForm" data-color="grey" >contractors</a>
                            </span>
                        </div> <!-- .tabs -->

                        <article class="entry-content customersForm" itemprop="articleBody" >
                            <?php the_field('contact_us_page_customers_form') ?>
                        </article>

                        <article class="entry-content contractorsForm" itemprop="articleBody" >
                            <?php the_field('contact_us_page_contractors_form') ?>
                        </article>

                        </div>
                    </section>

                <?php endwhile; endif; ?>

            </article>

		</main>

	</div>

<?php get_footer(); ?>
