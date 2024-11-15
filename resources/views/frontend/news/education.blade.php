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
    <title>Education</title>
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
    <div class="flex flex-col mx-5">


        <!-- Header section for the Politics category title -->
        <p class="flex text-4xl font-bold py-5 mx-5 sm:mx-10 md:mx-20 lg:mx-24">Education</p>

        <!-- Main content section, organized for responsiveness across screen sizes -->
        <div class="flex flex-col md:flex-row py-6 md:py-8 lg:py-10 space-y-5 md:space-y-0 md:space-x-5 gap-5 mx-5 sm:mx-10 md:mx-20 lg:mx-24">

            <!-- Image Section: displays the article image with clickable functionality -->
            <div class="flex-shrink-0">
                <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[400px] " onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
            </div>

            <!-- Text Section: displays the article title, description, and metadata -->
            <div class="flex flex-col gap-3 md:gap-5">
                <!-- Article title with clickable functionality and responsive font sizes -->
                <h2 class="text-base sm:text-lg md:text-2xl lg:text-3xl font-bold cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                    TU forms committee to probe into missing answer sheets
                 </h2>

                <!-- Article description -->
                <p>The weather will be partly cloudy in the hilly regions and fair in the rest of the country. According to
                    the Department of Hydrology and Meteorology, the weather will be partly cloudy in the hilly regions of
                    Koshi, Bagmati, Gandaki and Lumbini pr…</p>

                <!-- Metadata section with publication date and comment count -->
                <div class="flex flex-col sm:flex-row sm:items-center text-gray-500 text-xs sm:text-sm space-y-2 sm:space-y-0 sm:space-x-3">
                    <!-- Date of publication -->
                    <span class="flex items-center">
                        <i class="far fa-clock mr-1"></i>
                        2 days ago
                    </span>
                    <!-- Comment count indicator -->
                    <span class="flex items-center">
                        <i class="far fa-comment mr-1"></i>
                        0 Comments
                    </span>
                </div>
            </div>
        </div>

        <!-- Divider line between content items -->
        <div class="border-[1px]"></div>

        <!-- Repeated content block, structure identical to the first one -->
        <div class="flex flex-col md:flex-row py-6 md:py-8 lg:py-10 gap-5 space-y-5 md:space-y-0 md:space-x-5 mx-5 sm:mx-10 md:mx-20 lg:mx-24">

            <!-- Image Section -->
            <div class="flex-shrink-0">
                <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[400px] " onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
            </div>

            <!-- Text Section -->
            <div class="flex flex-col gap-3 md:gap-5">
                <h2 class="text-base sm:text-lg md:text-2xl lg:text-3xl font-bold cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                   TU forms committee to probe into missing answer sheets
                </h2>
                <p>The weather will be partly cloudy in the hilly regions and fair in the rest of the country. According to
                    the Department of Hydrology and Meteorology, the weather will be partly cloudy in the hilly regions of
                    Koshi, Bagmati, Gandaki and Lumbini pr…</p>

                <div class="flex flex-col sm:flex-row sm:items-center text-gray-500 text-xs sm:text-sm space-y-2 sm:space-y-0 sm:space-x-3">
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

        <!-- EDITOR'S PICK Section -->
        <div class=" flex flex-col xl:gap-3 bg-gray-100 p-2 my-2 border-2 py-5 mx-5 sm:mx-10 md:mx-20 lg:mx-24">
            <p class=" flex justify-center text-third items-center text-2xl font-bold leading-5 py-5"> EDITOR'S PICK</p>
            <div class="grid md:grid-cols-2  lg:grid-cols-3 xl:grid-cols-4 gap-5">


                <div class="flex flex-row md:flex-col gap-2 border-[1px] p-2">
                    <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[400px] " onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
                    <h2 class="text-xs md:text-sm lg:text-xl  mt-5 md:mt-0    w-52 md:w-full font-bold leading-5  cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                       TU forms committee to probe into missing answer sheets
                    </h2>

                </div>
                <div class="flex flex-row md:flex-col gap-2 border-[1px] p-2">
                    <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[400px] " onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
                    <h2 class="text-xs md:text-sm lg:text-xl  mt-5 md:mt-0    w-52 md:w-full font-bold leading-5  cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                       TU forms committee to probe into missing answer sheets
                    </h2>

                </div>
                <div class="flex flex-row md:flex-col gap-2 border-[1px] p-2">
                    <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[400px] " onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
                    <h2 class="text-xs md:text-sm lg:text-xl  mt-5 md:mt-0    w-52 md:w-full font-bold leading-5  cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                       TU forms committee to probe into missing answer sheets
                    </h2>

                </div>
                <div class="flex flex-row md:flex-col gap-2 border-[1px] p-2">
                    <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[400px] " onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
                    <h2 class="text-xs md:text-sm lg:text-xl  mt-5 md:mt-0    w-52 md:w-full font-bold leading-5  cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                       TU forms committee to probe into missing answer sheets
                    </h2>

                </div>
            </div>
        </div>

        <!-- Second last div Section -->
        <div class="flex flex-col lg:flex-row xl:gap-3 p-2 my-2 py-20 mx-5 sm:mx-10 md:mx-20 lg:mx-20">
            <!-- Left section (w-3/4) -->
            <div class="flex flex-col gap-10">
                <div class="w-full flex flex-col md:flex-row gap-5">
                    <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[250px] rounded" onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
                    <div class="flex flex-col gap-5">
                        <h2 class="text-xs md:text-sm lg:text-3xl mt-5 md:mt-0 w-52 md:w-full font-bold leading-9 cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                            COP29 an opportunity for Nepal to present its agenda, says President Paudel
                        </h2>
                        <p class="font-light">A six-time Minister Rajiv Gurung alias Deepak Manange, who refused to become a minister two months ago, has been sent to Dillibazar jail. A team of Central Investigation Bureau of Nepal Police apprehended former Minister of Gandaki Province…</p>
                    </div>
                </div>
                <div class="border-[1px]"></div>
                <div class="w-full flex flex-col md:flex-row gap-5">
                    <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[250px] rounded" onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
                    <div class="flex flex-col gap-5">
                        <h2 class="text-xs md:text-sm lg:text-xl mt-5 md:mt-0 w-52 md:w-full font-bold leading-5 cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                           TU forms committee to probe into missing answer sheets
                        </h2>
                        <p>A six-time Minister Rajiv Gurung alias Deepak Manange, who refused to become a minister two months ago, has been sent to Dillibazar jail. A team of Central Investigation Bureau of Nepal Police apprehended former Minister of Gandaki Province…</p>
                    </div>
                </div>
                <div class="border-[1px]"></div>
                <div class="w-full flex flex-col md:flex-row gap-5">
                    <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[250px] rounded" onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
                    <div class="flex flex-col gap-5 ">
                        <h2 class="text-xs md:text-sm lg:text-3xl mt-5 md:mt-0 w-52 md:w-full font-bold leading-9 cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                           TU forms committee to probe into missing answer sheets
                        </h2>
                        <p class="font-light">A six-time Minister Rajiv Gurung alias Deepak Manange, who refused to become a minister two months ago, has been sent to Dillibazar jail. A team of Central Investigation Bureau of Nepal Police apprehended former Minister of Gandaki Province…</p>
                    </div>
                </div>
                <div class="border-[1px]"></div>
                <div class="w-full flex flex-col md:flex-row gap-5">
                    <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[250px] rounded" onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
                    <div class="flex flex-col gap-5">
                        <h2 class="text-xs md:text-sm lg:text-3xl mt-5 md:mt-0 w-52 md:w-full font-bold leading-9 cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                           TU forms committee to probe into missing answer sheets
                        </h2>
                        <p class="font-light">A six-time Minister Rajiv Gurung alias Deepak Manange, who refused to become a minister two months ago, has been sent to Dillibazar jail. A team of Central Investigation Bureau of Nepal Police apprehended former Minister of Gandaki Province…</p>
                    </div>
                </div>
                <div class="border-[1px]"></div>
                <div class="w-full flex flex-col md:flex-row gap-5">
                    <img class="cursor-pointer w-[80px] sm:w-[120px] md:w-[200px] lg:w-[250px] rounded" onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
                    <div class="flex flex-col gap-5">
                        <h2 class="text-xs md:text-sm lg:text-3xl mt-5 md:mt-0 w-52 md:w-full font-bold leading-9 cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                           TU forms committee to probe into missing answer sheets
                        </h2>
                        <p class="font-light">A six-time Minister Rajiv Gurung alias Deepak Manange, who refused to become a minister two months ago, has been sent to Dillibazar jail. A team of Central Investigation Bureau of Nepal Police apprehended former Minister of Gandaki Province…</p>
                    </div>
                </div>

            </div>

            <!-- Divider between sections (optional) -->
            <div class="border-[1px]"></div>

            <!-- Right section -->
            <div class="w-[80%]  flex flex-col gap-5 ">
                <div class="flex flex-col md:flex-row gap-2 p-2">
                    <h2 class="text-sm leading-[1.4] font-inter font-bold tracking-inherit cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                       TU forms committee to probe into missing answer sheets
                    </h2>
                    <img class="cursor-pointer w-[40px] sm:w-[80px] md:w-[100px] lg:w-[170px] h-auto" onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
                </div>
                <div class="border-[1px]"></div>
                <div class="flex flex-col md:flex-row gap-2 p-2">
                    <h2 class="text-sm leading-[1.4] font-inter font-bold tracking-inherit cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                       TU forms committee to probe into missing answer sheets
                    </h2>
                    <img class="cursor-pointer w-[40px] sm:w-[80px] md:w-[100px] lg:w-[170px] h-auto" onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
                </div>

                <div class="border-[1px]"></div>
                <div class="flex flex-col md:flex-row gap-2 p-2">
                    <h2 class="text-sm leading-[1.4] font-inter font-bold tracking-inherit cursor-pointer hover:text-texthead" onclick="window.location.href='/detail';">
                       TU forms committee to probe into missing answer sheets
                    </h2>
                    <img class="cursor-pointer w-[40px] sm:w-[80px] md:w-[100px] lg:w-[170px] h-auto" onclick="window.location.href='/detail';" src="{{ asset('assets/images/education.png') }}" alt="About Us Image">
                </div>
                <div class="border-[1px]"></div>
            </div>
        </div>

    </div>
</body>



</html>
@endsection
<!-- Ends the main container section -->
