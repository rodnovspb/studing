<div class="footer">
  				<div class="footer_widgets">
					<?php if(!dynamic_sidebar('footer')): ?>
					 	 <ul class="footer_ul">
					<?php wp_list_categories(['title_li' => false, ]) ?>
						</ul>
                    <?php endif; ?>
				</div>
				<div class="wrap">
				<h3>SAY HELLO</h3>
				<p>Lorem ipsum dolor sit amet, consect etur adipiscing elit. Vestibulum ut tortor urnati dunt
						dolor. Nunc vulputate ultrices con sect etur donec semper lacinia ultri dolore cie
						lorem ipsum commete.</p>
			<div class="footerlinks">
				<div class="share">
		                	<li><a href="#" target="_blank" title="Facebook"><span class="social fbook"> </span></a></li>
		                	<li><a href="#" target="_blank" title="twitter"><span class="social twitter"> </span></a></li>
		                    <li><a href="#" target="_blank" title="tumblr"><span class="social tumblr"> </span></a></li><br />
		                    <li><a href="#" target="_blank" title="delicious"><span class="social delicious"> </span></a></li>
		                	<li><a href="#" target="_blank" title="delicious"><span class="social delicious"> </span></a></li>
		                	<li><a href="#" target="_blank" title="dribbble"><span class="social dribbble"> </span></a></li>
		                    <li><a href="#" target="_blank" title="evernote"><span class="social evernote"> </span></a></li>
		                    <li><a href="#" target="_blank" title="stumbleupon"><span class="social stumbleupon"> </span></a></li>
		                </div>
			</div>
			<div class="footer_menu">
			  <?php wp_nav_menu(['theme_location' => 'menu', 'container'=> false]) ?>
			</div>
			</div>
			</div>
			<div class="footer1">
	<p class="link"><span>© 2013 pro_blog. All rights Reserved | Наша почта: <a href="mailto:<?php bloginfo('admin_email'); ?>?subject='С сайта Трэвел'" type="email"><?php bloginfo('admin_email'); ?></a>	</span></p>
</div>
		<!-- End-wrap -->
<?php wp_footer(); ?>
</body>
</html>
</body>
</html>
