<meta charset="utf-8">

<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<?php
$url = $_SERVER['REQUEST_URI'];

$route = '/page/(?<catSlug>[a-z0-9_-]+)/(?<pageSlug>[a-z0-9_-]+)';
if(preg_match("#^$route$#", $url, $params)) {
//  $page = include 'view/page/show.php';
    $catSlug = $params['catSlug'];
    $pageSlug = $params['pageSlug'];
    $query = "SELECT pages.title, pages.content FROM pages
LEFT JOIN 
    categories ON categories.id = pages.category_id
WHERE 
	pages.slug = '$pageSlug' AND categories.slug = '$catSlug'

";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $page = mysqli_fetch_assoc($result);
    echo "<pre>";
    print_r($page);
    echo "</pre>";
}

$route = '/page/(?<catSlug>[a-z0-9_-]+)';
if(preg_match("#^$route$#", $url, $params)) {
//  $page = include 'view/page/category.php';
    $catSlug = $params['catSlug'];
    $query = "SELECT pages.title, pages.slug
FROM pages
LEFT JOIN categories ON categories.id = pages.category_id
WHERE 
categories.slug = '$catSlug'
";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
	$content = '';
	foreach ($data as $elem) {
	  $item = '<div><a href="' . $catSlug . '/' . $elem['slug'] . '">' . $elem['title'] . '</a></div>';
      $content .= $item;
	}
	echo $content;
}

$route = '/';
if(preg_match("#^$route$#", $url, $params)) {
	$query = "SELECT * FROM pages";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row);
	$content = '';
	foreach ($data as $elem) {
	  $item = '<div><a href="' . $elem['slug'] . '">' . $elem['title'] . '</a></div>';
      $content .= $item;
	}
	echo $content;
}






?>






















<?php

//$url = $_SERVER['REQUEST_URI'];
//
//if(preg_match('#^/page/all$#', $url, $match)){
//    $query = "SELECT * FROM pages";
//    $result = mysqli_query($link, $query) or die(mysqli_error($link));
//    for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
//    $content = '';
//    foreach($data as $elem){
//        $item = '<div><a href="/page/' . $elem['slug'] . '">' . $elem['title'] . '</a></div>';
//        $content .= $item;
//    }
//    echo $content;
//}
//
//elseif(preg_match('#/page/(?<slug>[a-z0-9_-]+)#', $url, $match)) {
//    $page = $match['slug'];
//    $query = "SELECT * FROM pages WHERE slug = '$page'";
//    $result = mysqli_query($link, $query) or die(mysqli_error($link));
//    $data = mysqli_fetch_assoc($result);
//    if (isset($data)) {
//        $layout = file_get_contents('layout.php');
//        $layout = str_replace('{{title}}', $data['title'], $layout);
//        $layout = str_replace('{{content}}', $data['content'], $layout);
//        echo $layout;
//    }
//    else {
//      echo '
//<form action="" method="post">
//	<input name="slug" placeholder="slug">
//	<input name="title" placeholder="title">
//	<input name="content" placeholder="content">
//	<input type="submit">
//</form>
//
//      ';
//	}
//}
//?>
<!---->
<?php
//
//if(!empty($_POST)) {
//  $slug = $_POST['slug'];
//  $title = $_POST['title'];
//  $content= '<div>' . $_POST['content'] . '</div>';
//  $query = "INSERT INTO pages SET title = '$title', slug = '$slug', content = '$content'";
//  mysqli_query($link, $query) or die(mysqli_error($link));
//  header('Location: all');
//}
//
//
//?>



