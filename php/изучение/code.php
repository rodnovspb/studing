



<?php


$names = array_diff(scandir('dir'), ['.', '..']);

echo "<ul>";
	foreach ($names as $name){
	  echo "<li>$name</li>";
	}
echo "</ul>";
















?>


















</body>
</html>


