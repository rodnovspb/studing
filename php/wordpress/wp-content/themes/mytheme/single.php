	<?php get_header(); ?>
	<?php
	require_once 'show.php';


	foreach(get_tags() as $tag){
	  echo '<a href="' . get_tag_link($tag->term_id) .'">' . $tag->name . '</a><br>';
	};


	?>

	<div class="middle">
		<?php the_post(); ?>
	  	<h1><?php the_title(); ?></h1>
		<div class="author_date">
		  <div>Автор: <?php the_author();?></div>
		  <div>Дата публикации: <?php the_date();?></div>
		</div>
	  	<?php the_content();?>
        <?php echo do_shortcode("[site_url]")?>
		<?php comments_template(); ?>
	</div>
    <?php get_footer(); ?>