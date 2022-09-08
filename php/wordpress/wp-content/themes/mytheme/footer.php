<footer class="footer">
			<?php echo date('Y') ?> © Я и компания моя
			<div class="footer--my">
			  <?= "<div>Автор: " . get_the_author() . "</div>" ?>
			  <?= "<div>" . date_ru() . "</div>" ?>
			  <?= "<div><a href='" . home_url() . "'>На главную</a></div>" ?>
			</div>


		</footer>

<?php
require_once 'show.php';
$cats = get_categories();
$tags = get_tags();
?>

<div class="footer__links">
  	<div>
	  	<span>Категории</span>
	  	<ul>
	    	<?php foreach ($cats as $cat): ?>
		  		<li><a href="<?= get_category_link($cat->term_id) ?>"><?= $cat->name ?></a></li>
        	<?php endforeach; ?>
		</ul>
	</div>
	<div>
	  	<span>Метки</span>
  		<ul>
	    	<?php foreach ($tags as $tag): ?>
		  		<li><a href="<?= get_tag_link($tag->term_id) ?>"><?= $tag->name ?></a></li>
        	<?php endforeach; ?>
		</ul>
	</div>
  	<div>
	  	<span>Посты пользователя id2</span>
  		<ul>
	  		<?php $posts = new WP_Query('author=2'); ?>
        	<?php if($posts->have_posts()): while ($posts->have_posts()): $posts->the_post(); ?>
			  	<li><a href="<?= get_permalink() ?>"><?php the_title() ?></li></a>
        	<?php endwhile; ?>
        	<?php else: ?>
			  <p>Постов не найдено</p>
        	<?php endif; ?>
		</ul>
	</div>
  	<div>
	  <span>Посты за прошлый месяц</span>
	  <ul>
		<?php
        $lastMon = getdate()['mon']-1;
        $posts = get_posts(['monthnum'=>$lastMon]);
        foreach ($posts as $post): ?>
		<li><a href="<?= get_permalink() ?>"><?= $post->post_title ?> <?= $post->post_date ?></a></li>
		<?php endforeach; ?>
	  </ul>
	</div>
</div>

<div>
  <?php

  ?>


</div>

<?php wp_footer(); ?>
</body>
</html>
