<?php get_header(); ?>

<div class="wrap">
	<div class="about">

		<?php get_sidebar(); ?>
        <div class="bloder-content">
	  	<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="bloger-grid">
			<div class="blog-img">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
			</div>
			<div class="bloger-content">
				<h3 class="single_header"><?php the_title() ?></h3>
                <?php the_content(''); ?>
                <div>Дата публикации: <?php the_time('j-m-Y'); ?></div>
			</div>

			<div class="mark"><?php the_tags(); ?></div>
		</div>

        <?php endwhile; ?>
        <?php else: ?>
            <div>Записей не найдено</div>
        <?php endif; ?>
		</div>



</div>
</div>
<div class="clear"> </div>



<?php get_footer(); ?>

