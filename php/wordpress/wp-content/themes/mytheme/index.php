	<?php get_header(); ?>
	<?php
	echo has_post_thumbnail(95);

	?>
	<div class="middle">
		<div class="main">
		  <div class="content">
			<?php
              if (have_posts()) {
                  while (have_posts()) {
                      the_post();
                      echo "<h3><a href='" . get_permalink() . "'>" . get_the_title() . " (ID поста " . get_the_ID() . ")</a></h3>";
                      the_excerpt();
                      echo "<div class='cats'>";
                      $links = array_map(function ($cat){
                        return sprintf('<a href="%s">%s</a>',
                            get_category_link($cat),
                            $cat->name);
					  }, get_the_category());
                      echo implode(', ', $links);
                      echo "</div>";
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
