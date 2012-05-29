<?php get_header(); ?>
  <div id="content">
  
  <?php if (have_posts()) : ?>
  
  	<?php while (have_posts()) : the_post(); ?>
  
    <div class="post" id="post-<?php the_ID(); ?>">
	  <div class="post-date"><span class="post-month"><?php the_time('M') ?></span> <span class="post-day"><?php the_time('d') ?></span></div>
	  <div class="post-title">
	  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Link permanente para: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<span class="post-cat"><?php the_category(', ') ?></span> <span class="post-comments"><?php comments_popup_link('Sem Coment&aacute;rios &#187;', '1 Coment&aacute;rio &#187;', '% Coment&aacute;rios &#187;'); ?></span>
	  </div>
	  <div class="entry">
		<?php the_content('Leia o post completo &raquo;'); ?>
	  </div>
	</div><!--/post -->
	
	<?php endwhile; ?>
	
	<div class="navigation">
	  <span class="previous-entries"><?php next_posts_link('Posts Anteriores') ?></span> <span class="next-entries"><?php previous_posts_link('Pr&oacute;ximos Posts') ?></span>
	</div>
	
	<?php else : ?>
	
		<h2>N&atilde;o Encontrado.</h2>
		<p>Desculpe, mas voc&ecirc; est&aacute; procurando algo que n&atilde;o est&aacute; mais aqui.</p>
		
  <?php endif; ?>
	
  </div><!--/content -->
  
<?php get_sidebar(); ?>

<?php get_footer(); 

?></html>


 