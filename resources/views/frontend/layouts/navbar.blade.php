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
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Mulish:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Importing Tailwind CSS -->
    @vite('resources/css/app.css')


</head>




<!-- Main Navigation -->


<nav class="font-bebas flex items-center p-3 bg-secondary md:bg-primary sticky top-0 left-0 w-full z-50" role="navigation">
    <!-- Logo -->

    <!-- Search bar for mobile -->
    <div class="flex  sm:hidden items-center justify-center flex-grow mx-4 search-bar">
        <form class="flex items-center justify-center">
            <input type="text" name="query" placeholder="news" class="px-2 h-6 rounded-l-lg border border-gray-300 py-1 focus:outline-none focus:ring-1 focus:ring-gray-500 w-28" aria-label="Search">
            <button type="submit" class="bg-green-500 border-gray-300 tracking-normal text-white rounded-r-lg px-2 flex items-center justify-center h-6">
                <i class="fas fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </div>

    <!-- Hamburger menu for mobile -->
    <div class="sm:hidden">
        <button id="menu-toggle" class="text-gray-700 focus:outline-none" aria-label="Toggle Menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div>

    <!-- Desktop links and search bar -->
    <div class="hidden sm:flex  justify-between sm:gap-10 md:gap-5 lg:gap-8  xl:gap-10 2xl:gap-5 px-6 md:px-5 lg:px-8 xl:px-16 2xl:px-28  nav-links">
        <div class="flex flex-row gap-5 md:gap-8 ml-1 md:ml-11 lg:gap-5 xl:gap-12 items-center justify-center lg:ml-10 xl:ml-2 2xl:gap-5">
            <a href="/" class="hover:text-third transition-all cursor-pointer  text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl text-white tracking-wide ">Home</a>

            <div class="relative group ">

                <a class="hover:text-third flex items-center  text-xs sm:text-sm md:text-base lg:text-xl font-medium tracking-normal text-white">
                    <!-- Font Awesome CSS -->
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
                    News<i class="fas fa-chevron-down ml-2"></i>
                </a>

                <div class="items-start absolute hidden group-hover:block bg-primary w-[160px] sm:w-[200px] md:w-[240px] shadow-[rgba(0,_0,_0,_0.84)_0px_3px_10px] z-50">
                    <ul class="text-xs sm:text-sm md:text-base font-medium px-3 sm:px-5 md:px-7 transition-all cursor-pointer">
                        <li class="hover:text-third py-2 sm:py-3 tracking-normal text-white">
                            <a href="{{ url('/poltics') }}">Politics</a>
                        </li>
                        <li class="hover:text-third py-2 sm:py-3 tracking-normal text-white">
                            <a href="{{ url('/education') }}">Education</a>
                        </li>
                        <li class="hover:text-third py-2 sm:py-3 tracking-normal text-white">
                            <a href="{{ url('/health') }}">Health</a>
                        </li>
                        <li class="hover:text-third py-2 sm:py-3 tracking-normal text-white">
                            <a href="{{ url('/sports') }}">Sport</a>
                        </li>
                        <li class="hover:text-third py-2 sm:py-3 tracking-normal text-white">
                            <a href="{{ url('/international') }}">International</a>
                        </li>

                    </ul>
                </div>
            </div>
            <a href="/economy" class="hover:text-third transition-all cursor-pointer font-medium text-xs sm:text-sm md:text-base lg:text-xl tracking-normal text-white">Economy</a>
            <a href="/lifestyle" class="hover:text-third transition-all cursor-pointer font-medium text-xs sm:text-sm md:text-base lg:text-xl tracking-normal text-white">Lifestyle</a>
            <a href="/entertainment" class="hover:text-third transition-all cursor-pointer font-medium text-xs sm:text-sm md:text-base lg:text-xl tracking-normal text-white">Entertainment</a>
            <a href="/travel" class="hover:text-third transition-all cursor-pointer font-medium text-xs sm:text-sm md:text-base lg:text-xl tracking-normal text-white">Travels</a>
            <a href="/contactus" class="hover:text-third transition-all cursor-pointer font-medium text-xs sm:text-sm md:text-base lg:text-xl 2xl:text-2xl tracking-normal text-white">Contact Us</a>
        </div>

        <!-- Desktop search bar -->
        <div class="flex md:ml-3 lg:ml-10 xl:ml-20 ">
            <form class="flex items-center justify-center desktop-search-bar">
                <input type="text" name="query" placeholder="search news" class="px-2 text-sm  rounded-l-md border border-gray-300 py-1 focus:outline-none focus:ring-1 focus:ring-gray-500 w-24 lg:w-40 xl:w-52 2xl:w-40" aria-label="Search">
                <button type="submit" class="bg-gray-600 tracking-normal  text-white rounded-r-lg lg:rounded-l-none px-2 flex items-center justify-center py-2">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Mobile menu -->
<div id="mobile-menu" class="sm:hidden   gap-2 px-2 items-center text-left bg-primary py-5 md:hidden ">
    <div class="flex md:hidden  gap-4">
        <a href="/" class="tracking-normal text-white hover:text-third transition-all cursor-pointer ml-2 ">Home</a>
        <a href="/contactus" class="tracking-normal text-white hover:text-third transition-all cursor-pointer ">Contact Us</a>
        <div class="relative group flex flex-row">
            <a class="flex tracking-normal text-white hover:text-third"> News<i class="fas fa-chevron-down ml-2 mt-2"></i></a>
            <div class="absolute hidden group-hover:block bg-primary w-[160px] sm:w-[200px] md:w-[240px] shadow-[rgba(0,_0,_0,_0.84)_0px_3px_10px] z-50">
                <ul class="flex flex-row gap-10  px-3 sm:px-5 md:px-7 transition-all cursor-pointer">
                    <li class="tracking-normal text-white hover:text-third py-2 sm:py-3">
                        <a href="{{ url('/poltics') }}">Politics</a>
                    </li>
                    <li class="tracking-normal text-white hover:text-third py-2 sm:py-3">
                        <a href="{{ url('/education') }}">Education</a>
                    </li>
                    <li class="tracking-normal text-white hover:text-third py-2 sm:py-3">
                        <a href="{{ url('/health') }}">Health</a>
                    </li>
                    <li class="tracking-normal text-white hover:text-third py-2 sm:py-3">
                        <a href="{{ url('/sports') }}">Sport</a>
                    </li>
                    <li class="tracking-normal text-white hover:text-third py-2 sm:py-3">
                        <a href="{{ url('/international') }}">International</a>
                    </li>
                </ul>
            </div>
        </div>
        <a href="/economy" class="tracking-normal text-white hover:text-third transition-all cursor-pointer ">Economy</a>
        <a href="/lifestyle" class="tracking-normal text-white hover:text-third transition-all cursor-pointer ">Lifestyle</a>
        <a href="/entertainment" class="tracking-normal text-white hover:text-third transition-all cursor-pointer ">Entertainment</a>
        <a href="/travel" class="tracking-normal text-white hover:text-third transition-all cursor-pointer ">Travels</a>
    </div>
</div>

<!-- JavaScript for toggling the mobile menu -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuToggle = document.getElementById("menu-toggle");
        const mobileMenu = document.getElementById("mobile-menu");

        menuToggle.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });
    });

</script>


</html>
