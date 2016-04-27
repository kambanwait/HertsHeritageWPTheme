<?php
/*
  Template Name: Home Page
*/
?>
<?php get_header(); ?>

	<div id="inner-content" class="wrap cf page">

		<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                    <!-- Block 1 -->
                    <section class="entry-content cf feature" itemprop="articleBody" >
                        <div id="pageCaptionAndImage">
                            <!-- :D RWD SRCSET :D -->
                            <?php
                                $imageId    = get_field('home_page_1st_block_image');
                                $img_src    = wp_get_attachment_image_url( $imageId, 'blog-small' );
                                $img_srcset = wp_get_attachment_image_srcset( $imageId, 'blog-small' );
                            ?>
                            <img src="<?php echo esc_url( $img_src ); ?>" srcset="<?php echo esc_attr( $img_srcset ); ?>" sizes="" alt="" />

                            <p><span>Maintaining Communities</span><br />one home at a time</p>
                        </div>

                        <div class="section-wrapper">
                            <div class="text">
                            <?php the_field('home_page_1st_block_text') ?>
                            </div>
                        </div>
                    </section>

                    <!-- Block 2 -->
                    <section class="entry-content cf blockTwo" itemprop="articleBody" >
                        <div class="section-wrapper">
                            <div class="text" style="background-image: url(<?php the_field('home_page_2nd_block_background_image'); ?>)">
                                <?php the_field('home_page_2nd_block_text') ?>
                            </div>

                            <!-- :D RWD SRCSET :D -->
                            <?php
                                $imageId    = get_field('home_page_2nd_block_image');
                                $img_src    = wp_get_attachment_image_url( $imageId, 'blog-small' );
                                $img_srcset = wp_get_attachment_image_srcset( $imageId, 'blog-small' );
                            ?>
                            <img src="<?php echo esc_url( $img_src ); ?>" srcset="<?php echo esc_attr( $img_srcset ); ?>" sizes="" alt="" />
                        </div>
                    </section>

                    <!-- Block 3 -->
                    <section class="entry-content cf blockThree" itemprop="articleBody" >
                        <div class="section-wrapper">
                            <!-- :D RWD SRCSET :D -->
                            <?php
                                $imageId    = get_field('home_page_3rd_block_image');
                                $img_src    = wp_get_attachment_image_url( $imageId, 'blog-small' );
                                $img_srcset = wp_get_attachment_image_srcset( $imageId, 'blog-small' );
                            ?>
                            <img src="<?php echo esc_url( $img_src ); ?>" srcset="<?php echo esc_attr( $img_srcset ); ?>" sizes="" alt="" />
                            <div class="text">
                                <?php the_field('home_page_3rd_block_text') ?>
                            </div>
                        </div>
                    </section>

                    <!-- Block 4 -->
                    <section class="entry-content cf blockFour" itemprop="articleBody" >
                        <div class="section-wrapper">
                            <div class="text">
                                <?php the_field('home_page_4th_block_text') ?>
                            </div>
                            <!-- :D RWD SRCSET :D -->
                            <?php
                                $imageId    = get_field('home_page_4th_block_image');
                                $img_src    = wp_get_attachment_image_url( $imageId, 'blog-small' );
                                $img_srcset = wp_get_attachment_image_srcset( $imageId, 'blog-small' );
                            ?>
                            <img src="<?php echo esc_url( $img_src ); ?>" srcset="<?php echo esc_attr( $img_srcset ); ?>" sizes="" alt="" />
                        </div>
                    </section>

			<?php endwhile; endif; ?>

		</main>

	</div>

<?php get_footer(); ?>
