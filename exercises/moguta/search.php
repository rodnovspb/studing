<?php

require 'bootstrap.php';

$search = $_GET["search"];

$users = User::query()->where('email', 'like', '%' . $search . '%')->with('info')->get();

exit(json_encode($users));


