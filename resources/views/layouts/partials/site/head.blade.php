<!DOCTYPE html>
<html lang="ar" dir="rtl">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>

    <!-- Fontawsome -->
    <link rel="stylesheet" href="{{asset('siteweb/css/all.min.css')}}" />
@if(App::getLocale() === 'ar')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Almarai", serif;
        }
    </style>
@else
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Roboto", sans-serif;
        }
    </style>
@endif


    <!-- Style Link -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="{{asset('siteweb/css/tailwind.css')}}">
    <link href="{{asset('siteweb/css/swiper-bundle.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('siteweb/css/style.css')}}" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('siteweb/img/favicon.ico')}}" />

    <!-- <style>
    body {
  font-family: "Almarai", serif;
     }
</style> -->

</head>



<body class="min-h-screen relative">
