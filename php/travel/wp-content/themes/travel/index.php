<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>

<h1><?php bloginfo('name'); ?></h1>
<?php bloginfo('description'); ?>
<br>
<a href="<?php echo home_url(); ?>">Главная страница</a>
<br>
<?php bloginfo('template_url'); ?>
<hr>
<?php if (have_posts()) : while (have_posts()) : the_post() ?>
	<h3><?php the_title(); ?></h3>
	<div>
		<?php the_excerpt(); ?>
	  	<a href="<?php the_permalink(); ?>">полный текст</a>
	</div>

<?php endwhile; ?>
<?php else: ?>
    <p>Записей нет...</p>
<?php endif; ?>














</body>
</html>
