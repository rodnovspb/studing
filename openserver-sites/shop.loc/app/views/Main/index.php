<h1>Привет!</h1>

<?php show($this->meta); ?>

<?php if(!empty($names)): ?>
    <?php foreach ($names as $name): ?>
        <?= $name->id ?>
    <?php endforeach; ?>
<?php endif; ?>


