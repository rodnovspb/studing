	<?php get_header(); ?>
	<div class="middle">
		<?php the_post(); ?>
	  	<h1><?php the_title(); ?></h1>
		<div class="author_date">
		  <div>Автор: <?php the_author();?></div>
		  <div>Дата публикации: <?php the_date();?></div>
		</div>
	  	<?php the_content();?>
		<div class="single_flex">
		  <div>
			<?php echo do_shortcode("[site_url]")?>
		  </div>
		  <div>
			<ul>
			  <?php $cats = get_the_category(get_the_ID());
			  foreach ($cats as $cat): ?>
			  <li><?= sprintf('<a href="%s">%s</a>', get_category_link($cat), $cat->name); ?></li>
			  <?php endforeach; ?>
			</ul>
		  </div>
		</div>

		<?php comments_template(); ?>
	</div>
    <?php get_footer(); ?>