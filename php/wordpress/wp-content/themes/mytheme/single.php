	<?php get_header(); ?>
	<div class="middle">
		<?php the_post(); ?>
	  	<h1><?php the_title(); ?></h1>
		<div class="author_date">
		  <div>Автор: <?php the_author();?></div>
		  <div>Дата публикации: <?php the_date();?></div>
		</div>
	  	<?php the_content(); ?>
		<?php comments_template(); ?>
	</div>
    <?php get_footer(); ?>