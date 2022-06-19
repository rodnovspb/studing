<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php echo wp_get_document_title(); ?></title>
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />

        <?php wp_head(); ?>
	</head>
	<body>
		<header class="header">
			<h1><?php bloginfo( 'name' ); ?></h1>
			<h2><?php bloginfo( 'description' ); ?></h2>
		</header>
		<div class="middle">
			<?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();


                    if(is_single()){
                      echo "<h1>" . get_the_title() ."</h1>";
                      echo "<div>Автор: " . get_the_author() . "</div>";
                      echo "<div>Время публикации: " . get_the_time() . "</div>";
					} else {
                      echo '<h2>'. get_the_title() .' </h2>';
                      echo "<div><a href='" . get_permalink() . "'>подробнее</a></div>";
                      echo "<div>" . the_post_thumbnail() . "</div>";
					}
						the_content();

                }
            } else {
                echo '<p>Записей нет...</p>';
            }
            ?>
		</div>
		<footer class="footer">
			<?php echo date('Y') ?> © Я и компания моя
		</footer>

        <?php wp_footer(); ?>
	</body>
</html>