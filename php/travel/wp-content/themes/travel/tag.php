<?php get_header(); ?>

<div class="wrap">
	<div class="about">
        <h2>Записи по метке: "<?php  single_tag_title()?>"</h2>
        <?php get_sidebar(); ?>
        <div class="bloder-content">
	  	<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="bloger-grid">
			<div class="blog-img">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
			</div>
			<div class="bloger-content">
				<h5><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5>
                <?php the_content(''); ?>
                <ul>
					<li>Дата публикации</li>
					<li><?php the_time('j-m-Y'); ?></li>
					<li><a href="<?php the_permalink(); ?>"><span>Читать далее</span></a></li>
				</ul>
			</div>

			<div class="mark"><?php the_tags(); ?></div>
		</div>

        <?php endwhile; ?>
		<div class="pagination">
		  	<?php
            $big = 999999999; // need an unlikely integer
            global $wp_query;
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages
            ) );
            ?>
		</div>
        <?php else: ?>
            <div>Записей не найдено</div>
        <?php endif; ?>
		</div>



</div>
</div>
<div class="clear"> </div>


<?php get_footer(); ?>

