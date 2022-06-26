<?php get_header(); ?>

<div class="wrap">
	<div class="about">

		<?php get_sidebar(); ?>
        <div class="bloder-content">
        <div class="page-my">
	  	<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="bloger-grid">
			<div class="bloger-content">
				<h3 class="page_header"><?php the_title() ?></h3>
                <?php the_content(''); ?>
			</div>
         </div>
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


