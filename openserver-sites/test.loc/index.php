<?php
require_once 'show.php';



$str = '<p>
	text1
</p>
<p>
	text2
</p>
<p class="block">
	text3
</p>';

preg_match_all('#<p[^>]*(.+?)</p>#su', $str, $match, PREG_PATTERN_ORDER);

show($match[0], 1);


