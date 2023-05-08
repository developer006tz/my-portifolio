<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ludovick is a passionate software engineer with two years of experience. He enjoys learning new skills and technologies and sharing his knowledge with others.">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="software developer, software engineer, programming">
    <meta name="author" content="Ludovick">
    <meta name="application-name" content="Ludovick's Portfolio">
    <meta name="generator" content="Laravel 9">

<meta property="og:url" content="https://www.instagram.com/tm_ludovic/">
<meta property="og:type" content="Instagram">
<meta property="og:title" content="Ludovic - Software Developer">
<meta property="og:description" content="Ludovic is a passionate software engineer with two years of experience. He enjoys learning new skills and technologies and sharing his knowledge with others.">
<meta property="og:image" content="https://ludovickonyo.com/img/konyo-profile.png">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="https://twitter.com/Ludovic_konyo">
<meta name="twitter:title" content="Ludovic - Software Developer">
<meta name="twitter:description" content="Ludovic is a passionate software engineer with two years of experience. He enjoys learning new skills and technologies and sharing his knowledge with others.">
<meta name="twitter:image" content="https://pbs.twimg.com/profile_images/1655689842334760963/WvrYMwCy_400x400.jpg">

<link rel="canonical" href="https://www.linkedin.com/in/ludovick-konyo-186504252/">

<link rel="me" href="https://github.com/developer006tz">

    <title>Ludovick - Software Engineer profile</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('img/dev.png')}}">


    <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.js" integrity="sha512-G1QAKkF7DrLYdKiz55LTK3Tlo8Vet2JnjQHuJh+LnU0zimJkMZ7yKZ/+lQ/0m94NC1EisSVS1b35jugu3wLdQg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script src="https://apis.google.com/js/platform.js"></script>
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
</head>

<body class="text-gray-800 dark:text-gray-200 ">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 pt-24">
    <x-layout.navbar></x-layout.navbar>
    {{ $slot }}
    <x-layout.footer></x-layout.footer>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script>
  $(function (){
    $(function(){ $('#dark_light').bootstrapToggle() });
  })

</script>
</body>
</html>
