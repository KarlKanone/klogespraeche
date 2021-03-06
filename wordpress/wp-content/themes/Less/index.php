<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php bloginfo('name'); ?> | <?php if( is_home() ) : echo bloginfo( 'description' ); endif; ?><?php wp_title( '', true ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start header
	/*-----------------------------------------------------------------------------------*/
?>

<header id="header" role="banner">
    <div class="container">

    <div id="header">
        <h1>
            <a href="<?php bloginfo('url'); ?>">
                <img src="http://klogespraeche.local/wp-content/themes/Less/images/logo_klogespraeche.png" alt="<?php bloginfo('name'); ?>" />
            </a>
        </h1>

        <nav role="navigation" class="site-navigation main-navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </nav><!-- .site-navigation .main-navigation -->

        <div class="clear"></div>
    </div>
	</div><!--/container -->
</header><!-- #masthead .site-header -->

<div class="content">

<div class="container">

	<div id="primary">

        <div id="content" role="main">

            <?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Home loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_home() || is_archive() ) {
	
?>
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">

                        <div id="post">
                            <h1 class="title">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_title() ?>
                                </a>
                            </h1>

                            <div id="publication-date">
                                <p id="date">
                                <?php echo date('d M Y H:i') ?>
                                </p>
                            </div>

                            <div class="post-meta">
                                <ul class="opinion">
                                    <li class="opinion">
                                        <a title="Kommentiere Lorem ipsum dolor sit amet" href="http://klogespraeche.local/">

                                        <span class="glyphicon glyphicon-thumbs-up" id="pro"></span>
                                        </a>
                                    </li>
                                    <li class="opinion">
                                        <a title="Kommentiere Lorem ipsum dolor sit amet" href="http://klogespraeche.local/">
                                        <span class="glyphicon glyphicon-thumbs-down" id="anti"></span>

                                        </a>
                                    </li>

                                    <li class="opinion">
                                <?php if( comments_open() ) : ?>
                                        <?php comments_popup_link( __( 'Comment', 'break' ), __( '1 Comment', 'break' ), __( '% Comments', 'break' ) ); ?>

                                <?php endif; ?>
                                    </li>
                                </ul>

                            </div><!--/post-meta -->

                            <div class="the-content">
                                <?php the_excerpt(); ?>

                                <?php wp_link_pages(); ?>
                            </div><!-- the-content -->

                            <div class="meta clearfix">
                                <div class="category"><?php echo get_the_category_list(); ?></div>
                                <div class="tags"><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); ?></div>
                            </div><!-- Meta -->
                        </div>

					</article>

				<?php endwhile; ?>
				
				<!-- pagintation -->
				<div id="pagination" class="clearfix">
					<div class="past-page"><?php previous_posts_link( 'Newer &raquo;' ); ?></div>
					<div class="next-page"><?php next_posts_link( ' &laquo; Older' ); ?></div>
				</div><!-- pagination -->


			<?php else : ?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; ?>

		
	<?php } //end is_home(); ?>

<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Single loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_single() ) {
?>


			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">

                        <div id="post">

                        <h1 class="title"><?php the_title() ?></h1>
						<div class="post-meta">
							<?php if( comments_open() ) : ?>
								<span class="comments-link">
									<?php comments_popup_link( __( 'Comment', 'less' ), __( '1 Comment', 'less' ), __( '% Comments', 'less' ) ); ?>
								</span>
							<?php endif; ?>
						
						</div><!--/post-meta -->
						
						<div class="the-content">
							<?php the_content( 'Continue...' ); ?>
							
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
						
						<div class="meta clearfix">
							<div class="category"><?php echo get_the_category_list(); ?></div>
							<div class="tags"><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); ?></div>
						</div><!-- Meta -->						
						</div>

					</article>

				<?php endwhile; ?>
				
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>


			<?php else : ?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; ?>


	<?php } //end is_single(); ?>
	
<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Page loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_page()) {
?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">
                        <div id="post">


                        <h1 class="title"><?php the_title() ?></h1>
						
						<div class="the-content">
							<?php the_content(); ?>
							
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
						</div>

					</article>

				<?php endwhile; ?>

			<?php else : ?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; ?>

	<?php } // end is_page(); ?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->

</div><!-- / container-->

</div>

<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Footer
	/*-----------------------------------------------------------------------------------*/
?>

<footer class="site-footer" role="contentinfo">
	<div class="site-info container">
		<?php do_action( 'break_credits' ); ?>
		<a href="http://wordpress.org/" title="A Semantic Personal Publishing Platform" rel="generator">Proudly powered by WordPress</a>
		<span class="sep"> and </span>
		<a href="http://lessmade.com/themes/less" rel="theme">LESS</a> by <a href="http://jarederickson.com" rel="designer">Jared Erickson</a>
	</div><!-- .site-info -->
</footer><!-- #colophon .site-footer -->

<?php wp_footer(); ?>

</body>
</html>
