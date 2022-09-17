<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create('ru_RU');

echo "<p>" . '$faker->time() - ' . $faker->time() . "</p>";
echo "<p>" . '$faker->date() - ' . $faker->date() . "</p>";
echo "<p>" . '$faker->url() - ' . $faker->url() . "</p>";
echo "<p>" . '$faker->bank() - ' . $faker->bank() . "</p>";
echo "<p>" . '$faker->company() - ' . $faker->company() . "</p>";
echo "<p>" . '$faker->address() - ' . $faker->address() . "</p>";
echo "<p>" . '$faker->randomNumber() - ' . $faker->randomNumber() . "</p>";
echo "<p>" . '$faker->name() - ' . $faker->name() . "</p>";
echo "<p>" . '$faker->email() - ' . $faker->email() . "</p>";
echo "<p>" . '$faker->word() - ' . $faker->word() . "</p>";
echo "<p>" . '$faker->sentence() - ' . $faker->sentence() . "</p>";
echo "<p>" . '$faker->realText() - ' . $faker->realText() . "</p>";
echo "<p>" . '$faker->text() - ' . $faker->text() . "</p>";
echo "<p>" . '$faker->colorName() - ' . $faker->colorName() . "</p>";
echo "<p>" . '$faker->creditCardNumber() - ' . $faker->creditCardNumber() . "</p>";
echo "<p>" . '$faker->phoneNumber() - ' . $faker->phoneNumber() . "</p>";
echo "<p>" . '$faker->hexColor() - ' . $faker->hexColor() . "</p>";
echo "<p>" . '$faker->imageUrl(640, 480) - ' . $faker->imageUrl(640, 480) . "</p>";
echo "<p>" . '$faker->boolean() - ' . $faker->boolean() . "</p>";
echo "<p>" . '$faker->randomDigit() - ' . $faker->randomDigit() . "</p>";
echo "<br><br><br><br><p>" . '$faker->randomHtml() - ' . $faker->randomHtml();



