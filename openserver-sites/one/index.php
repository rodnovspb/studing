<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<title>PHP веб сайт</title>

</head>
<body>

<div class="container py-3">
    <?php require 'blocks/header.php'?>
    <h3 class="mb-5">Наши статьи</h3>

    <div class="d-flex flex-wrap">
        <?php for($i=0; $i<5; $i++): ?>
            <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Текст</h4>
          </div>
          <div class="card-body">
              <img class="img-thumbnail" src="img/<?= $i + 1  ?>.jpg" alt="">
            <ul class="list-unstyled mt-3 mb-4">
              <li>10 users included</li>
              <li>2 GB of storage</li>
              <li>Email support</li>
              <li>Help center access</li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-outline-primary">Подробнее</button>
          </div>
        </div>
      </div>
        <?php endfor; ?>
    </div>
















    <?php require 'blocks/footer.php'?>
</body>
</html>