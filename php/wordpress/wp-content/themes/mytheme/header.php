<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php echo wp_get_document_title(); ?></title>
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
		<?php wp_get_custom_css(); ?>
        <?php wp_head(); ?>
	</head>
	<body>
		<div class="above">
			<?php if(is_user_logged_in()){
			    $path = wp_logout_url(get_permalink());
			    echo sprintf('<div><a class="logout_btn" href="%s">Выйти</a></div>', $path);
			  } ?>
		  	<?php
            if(current_user_can( 'manage_options' )){
                echo "<div class='admin_link'>" . wp_register('', '', 0) . "</div>";
			}

			?>
		  	<div><?php if(!is_user_logged_in()){wp_login_form(['label_username' => 'Логин']);} ?></div>
		  	<div><?php echo  get_search_form()  ?></div>
		</div>
		<header class="header mycolor font-color">
			<h1><?php bloginfo( 'name' ); ?></h1>
			<h2><?php bloginfo( 'description' ); ?></h2>
		  	<div style="display: flex; justify-content: space-between; padding: 0 10px">
				<div><?= do_shortcode("[day_of_week]") ?></div>
				<div><?= do_shortcode("[my_name]") ?></div>
			</div>
		  <div class="auth">
			<?php if(is_user_logged_in()){
                echo 'Пользователь авторизован';
			} else {
			  	echo 'Пользователь не авторизован';
			  }
            ?>
		  </div>
		</header>
	<div><?php wp_nav_menu([
            'theme_location' => 'primary',
		]) ?></div>