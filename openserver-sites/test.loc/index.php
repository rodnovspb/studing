<?php
require_once 'show.php';



$str = 'text
<footer id="footer" class="footer">
	<p>
		text
	</p>
	<p>
		text
	</p>
</footer>
text';

preg_match_all('#<footer[^>]*>(.+?)</footer>#su', $str, $match, PREG_PATTERN_ORDER);

show($match[0], 1);


