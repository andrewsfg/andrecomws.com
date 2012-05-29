<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
		<section id="slider">
				<?php $loop = new WP_Query( array( 'post_type' => 'slider', 'posts_per_page' => 3 ) ); ?>
				<ul class="slides">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<li>
						<?php
							$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						
						?>
						<div class="wrap">
							<?php
								  //get url image slider
								  $key = get_post_custom_values('meta-url');
								  foreach ( $key as $key => $value ) {
								    echo '<a href="' . $value . '">'; 
								  }
							?>							
							<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
							<figure><img src="<?php echo "$feat_image";?>" alt=""></figure>
							<?php the_content(); ?></a>
						</div>
					</li>

				<?php endwhile; ?>
				</ul>		
			</section> <!-- end #slider -->		
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="twelvecol clearfix" role="main">
						<div class="profile ninecol">
							<figure class="fourcol">
								<a href="sobre" title="Sobre"><img src="<?php echo get_template_directory_uri(); ?>/library/images/picture-andrews_fg.png" alt="Andrews F.G"></a>
							</figure>
							<div class="profile-info sevencol">
								<h2>Andrews Ferreira Guedis</h2>
								<p><strong>São Paulo/SP - 25 anos</strong></p>
								<p>Meu nome é Andrews Ferreira Guedis, tenho 25 anos e sou web designer, front-end developer, videomaker e músico...</p>
								<a href="sobre" class="button" title="Saiba Mais">Mais</a>
							</div> <!-- end .profile -->
						</div>
						<aside class="last-posts last threecol">
							<h2>Últimas postagens</h2>
							<ul>
								<?php
								global $post;
								$args = array( 'numberposts' => 2, 'offset'=> 0, 'category' => 0 );
								$myposts = get_posts( $args );
								foreach( $myposts as $post ) :	setup_postdata($post); ?>
								<li><a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'bones-thumb-60' ); ?>
									<?php the_title(); ?></a></li>
								<?php endforeach; ?>
							</ul>

						</aside> <!-- end .last-posts -->

					</div> <!-- end #main -->

					<?php //get_sidebar(); // sidebar 1 ?>
					
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>