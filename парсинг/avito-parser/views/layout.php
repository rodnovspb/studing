<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Парсер объявлений с Авито</title>
    
    <meta name="author" content="MasterMed" />

    <!-- Bootstrap -->
    <link href="sources/css/bootstrap.min.css" rel="stylesheet" />
    <link href="sources/css/style.css" rel="stylesheet" />
    <?= CSS ?>

    <!--[if lt IE 9]>
      <script src="sources/js/html5shiv.js"></script>
      <script src="sources/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="container">
          <div class="page-header">
              <h1>Парсер объявлений Авито</h1>
              <?= $mainLink; ?>
              <!--p class="lead">какой-то поясняющий текст</p-->
              <!--p class="small-text">Можно прикрутить версию, дату, время и т.д.</p-->
          </div>
          <?= BODY ?>            
      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="sources/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="sources/js/bootstrap.min.js"></script>
    <script src="sources/js/main.js"></script>
    <?= JSCRIPT ?>
  </body>
</html>
