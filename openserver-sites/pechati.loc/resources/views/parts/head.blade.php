<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="{{ $data->meta_description }}" />
  <meta name="keywords" content="{{ $data->meta_keywords }}" />
  <link rel="stylesheet" href="{{ asset('storage/fonts/fonts.css') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>{{ $data->meta_title }}</title>
</head>

<body>
  <div class="wrapper">

