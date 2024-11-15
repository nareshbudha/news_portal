<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="News-Portal - Your trusted partner in healthcare solutions.">
    <meta name="keywords" content="TAJ Group, Nepal, healthcare, medicine, products, services">
    <meta property="og:title" content="News-Portal - Healthcare Solutions">
    <meta property="og:description" content="Your trusted partner in healthcare solutions.">
    <meta property="og:type" content="website">
    <title>News-Portal</title>
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>


    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Importing Tailwind CSS -->
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-50">
    <div class="flex lg:gap-10 flex-col lg:flex-row   justify-between mx-10 ">
        <div class="flex flex-col items-center justify-center"> <img class="w-32 sm:w-40 md:w-56  lg:w-64 xl:w-72 2xl:w-96 rounded-lg py-2 cursor-pointer " src="{{ 'assets/images/News_Logo.png' }}" alt="nic ads" onclick="window.location.href='/';">
            <p class="text-gray-600 text-xs sm:text-sm">Tuesday, 21 November 2024</p>
        </div>
        <div class="w-full lg:w-4/5"> @include('frontend/advertisements/topads')
    </div>

    </div>

</body>

</html>
