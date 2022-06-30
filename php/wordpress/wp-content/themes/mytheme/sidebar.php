<div class="sidebar">
    <?php
    if ( function_exists('dynamic_sidebar') )
        dynamic_sidebar('homepage-sidebar');
    ?>
  <div>
	<?php do_action('my_hook', ['Привет,', 'Денис']); ?>
	<?php
	$name = apply_filters('filter__my', 'Денис');
	echo $name;
	echo "<div>Фильтр: </div>";
    $text = 'Lorem <b>Ipsum</b> is simply dummy text of the printing and typesetting industry.';
    echo text($text);

    ?>
  </div>
</div>

