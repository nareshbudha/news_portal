@extends('frontend.layouts.main')

@section('main-container')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="News Portal - Your trusted partner in news.">
    <meta name="keywords" content="News Portal, poltical news,healthcare, medicine, products, services">
    <meta property="og:title" content="News Portal - news  Solutions">
    <meta property="og:description" content="Your trusted partner in news.">
    <meta property="og:image" content="{{ asset('assets/news.png') }}">
    <meta property="og:type" content="website">
    <title>News Portal</title>
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Importing Tailwind CSS -->
    @vite('resources/css/app.css')


</head>

<body>
    <style>
        body {
            font-family: 'Muli', sans-serif;
        }
    </style>
    <div class="flex-col lg:flex-row flex md:mx-10 ">

        <div
            class="w-3/4 flex flex-col md:flex-row py-10 md:py-16 lg:py-20 space-y-5 md:space-y-0 md:space-x-5 mx-10 md:ml-20 ">
            <div class="flex flex-col">

                <div class="flex flex-col md:flex-row gap-5 py-5">

                    <!-- Image Section -->
                    <div class="flex-shrink-0 ">
                        <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[250px] rounded"
                            onclick="window.location.href='/detail';" src="{{ asset('assets/images/dipak.png') }}"
                            alt="About Us Image">
                    </div>

                    <!-- Text Section -->
                    <div class="flex flex-col gap-3 md:gap-5">
                        <h2 class="text-base md:text-xl lg:text-3xl font-bold leading-[33.6px] lg:w-[500px] cursor-pointer tracking-normal  hover:text-texthead"
                            onclick="window.location.href='/detail';">
                            Plane carrying Rabi Lamichhane Departs from Pokhara
                        </h2>

                        <div
                            class="flex flex-col sm:flex-row sm:items-center text-gray-500 text-xs sm:text-sm space-y-2 sm:space-y-0 sm:space-x-3">
                            <span class="flex items-center">
                                <i class="far fa-clock mr-1"></i>
                                2 days ago
                            </span>
                            <span class="flex items-center">
                                <i class="far fa-comment mr-1"></i>
                                0 Comments
                            </span>
                        </div>
                    </div>

                </div>
                @include('frontend/advertisements/middleads')
                <div class="flex flex-row gap-5 py-5">

                    <!-- Image Section -->
                    <div class="flex-shrink-0">
                        <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[250px] rounded"
                            onclick="window.location.href='/detail';" src="{{ asset('assets/images/maha.png') }}"
                            alt="About Us Image">
                    </div>

                    <!-- Text Section -->
                    <div class="flex flex-col gap-3 md:gap-5">
                        <h2 class="text-base md:text-xl lg:text-3xl font-bold leading-[33.6px] lg:w-[500px] cursor-pointer tracking-normal  hover:text-texthead"
                            onclick="window.location.href='/detail';">
                            15 UML leaders headed by senior Vice Chair Pokharel flying to China today
                        </h2>

                        <div
                            class="flex flex-col sm:flex-row sm:items-center text-gray-500 text-xs sm:text-sm space-y-2 sm:space-y-0 sm:space-x-3">
                            <span class="flex items-center">
                                <i class="far fa-clock mr-1"></i>
                                1 days ago
                            </span>
                            <span class="flex items-center">
                                <i class="far fa-comment mr-1"></i>
                                10 Comments
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="border-2"></div>

        <!-- Right side Section -->
        <div class="lg:w-1/3 flex flex-row gap-5  space-y-5 md:space-y-0 md:space-x-5  px-2 py-5">

            <div>
                <div class="flex-shrink-0 md:flex-row lg:flex-col  gap-10 py-5">
                     @include('frontend/advertisements/sideads')
                    <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[250px] rounded pt-5"
                        onclick="window.location.href='/detail';" src="{{ asset('assets/images/side.png') }}"
                        alt="About Us Image">
                    <h2 class="text-base  md:text-lg lg:text-xl font-semibold cursor-pointer py-3 hover:text-texthead"
                        onclick="window.location.href='/detail';">
                        Sports tourism promotes Nepal-China ties: Minister Pande
                    </h2>

                </div>
                <div class="py-4"> @include('frontend/advertisements/middleads')</div>
                <div class="border-2"></div>
                <div class="flex-shrink-0 flex-row lg:flex-col gap-10 py-5">
                    <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[250px] rounded"
                        onclick="window.location.href='/detail';" src="{{ asset('assets/images/side.png') }}"
                        alt="About Us Image">
                    <h2 class="text-base  md:text-lg lg:text-xl font-semibold cursor-pointer py-3 hover:text-texthead"
                        onclick="window.location.href='/detail';">
                        Sports tourism promotes Nepal-China ties: Minister Pande
                    </h2>


                </div>
                <div class="border-2"></div>
                <div class="py-4"> @include('frontend/advertisements/middleads')</div>

            </div>

        </div>
    </div>
    </div>


</body>

</html>
@endsection
