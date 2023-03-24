<?php
require_once 'show.php';



$str = '<h2>111</h2>
<p>
	---
</p>

<h2>222</h2>
<p>
	---
</p>

<h2 class="last">333</h2>
<p>
	---
</p>';

preg_match_all('#<h2[^>]*(.+?)</h2>#', $str, $match, PREG_PATTERN_ORDER);

show($match[0], 1);


