	<?php get_header(); ?>
	<div class="middle">
		<div class="main">
		  <div class="content">
			<?php
              if (have_posts()) {
                  while (have_posts()) {
                      the_post();
                      echo "<h3><a href='" . get_permalink() . "'>" . get_the_title() . "</a></h3>";
                      the_excerpt();
                  }
              } else {
                  echo '<p>Записей нет...</p>';
              }
              ?>
		  </div>
		  <div class="main__sidebar">
			<?php get_sidebar(); ?>
		  </div>
		</div>

	</div>
	<?php get_footer(); ?>
