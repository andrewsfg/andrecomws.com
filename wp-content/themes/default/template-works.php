<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>
			
			<div id="content">
				
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="twelvecol clearfix" role="main">
						
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
							
							<!--<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?>.</p>
						-->
						</header> <!-- end article header -->

						<section class="post-content clearfix" itemprop="articleBody">
							<form class="category-choose">
								<fieldset>
									<label>Filtrar por:
										<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
											<option value="?page_id=8?cat=web">Web</option>
											<option value="?page_id=8?cat=video"value="?page_id=8?web">Vídeo</option>
											<option value="?page_id=8?cat=designdigital">Design Digital</option>
											<option value="?page_id=8?cat=audio">Áudio</option>
										</select>
									</label>
								</fieldset>
							</form>

							<?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => 5 ) ); ?>

							<ul class="portfolio-list">
							
								<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<?php if (is_category('web')) { ?>
								<h1>Agora sim</h1>
							<?php } ?>
								
								<li class="fourcol"><?php //the_category(' &bull; '); ?><?php
								$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
								//echo "$feat_image";
								?>
								<?php the_title( '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark"><h2 class="entry-title text-center">', '</h2>' ); ?>
								<figure><img src="<?php echo "$feat_image";?>" alt=""></figure></a>
								<div>
									<?php the_title( '<h2 class="entry-title text-center">', '</h2>' ); ?>
									<?php the_excerpt(); ;?>
									<a href="<?php the_permalink();?>" class="button"> Leia mais</a>
								</div>
							</li>
						<?php //the_content(); ?>

				<?php endwhile; ?>

				<div class="navigation">
	<?php my_paginate_links();?>
				</ul>					
						</section> <!-- end article section -->
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
						
						<?php //comments_template(); ?>
						
						<?php endwhile; ?>		
						
						<?php else : ?>
						
						<article id="post-not-found">
						    <header>
						    	<h1>Not Found</h1>
						    </header>
						    <section class="post-content">
						    	<p>Sorry, but the requested resource was not found on this site.</p>
						    </section>
						    <footer>
						    </footer>
						</article>
						
						<?php endif; ?>
					
					</div> <!-- end #main -->
    				
					<?php //get_sidebar(); // sidebar 1 ?>
					
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>