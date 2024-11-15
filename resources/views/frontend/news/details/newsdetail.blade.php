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
<div class="flex flex-col lg:flex-row ml-20 py-5">

    <!-- Main Content Section -->
    <div class="w-full lg:w-4/5 flex flex-col px-5 mb-5 lg:mb-0">
          <!-- Top Advertisements Section -->
        @include('frontend/advertisements/middleads')
        <!-- Title -->
        <h1 class="text-2xl sm:text-3xl font-semibold mb-2">
            President Paudel to address COP29 today

        </h1>

        <!-- Meta Information -->
        <div class="flex items-center space-x-2 text-gray-500 text-xs sm:text-sm mb-4">
            <span>•</span>
            <span>Friday, November 8, 2024</span>
            <span class="flex items-center space-x-1">
                <i class="fas fa-comment"></i> <!-- Font Awesome Comment Icon -->
                <span>0 Comments</span>
            </span>
            <span>•</span>
            <span class="flex items-center space-x-1">
                <i class="fas fa-share-alt"></i> <!-- Font Awesome Share Icon -->
                <span>19 Shares</span>
            </span>
        </div>

        <!-- Image -->
        <img class="cursor-pointer w-full mb-4" src="{{ asset('assets/images/dipak.png') }}" alt="MP Manange Image">

        <!-- Description Text -->
        <p class="text-gray-700 leading-relaxed text-justify gap-10">
            <span> Kathmandu, November 8</span>
            <br>
            Gandaki Provincial Assembly Member Rajiv Gurung (alias Deepak Manange) has stated he will appear in court only after the full text of the verdict against him is released.
            <br><br>
            @include('frontend/advertisements/middleads')
            The Supreme Court recently upheld a Patan High Court ruling sentencing Gurung to five years in prison for attempted murder. Following the decision, Gurung reportedly switched off his phone and became unreachable.
            <br><br>
            In a statement issued on Friday, Gurung announced that he would present himself in court once the Supreme Court publishes the full text of the verdict.
            <br><br>
            “I sent my legal team to obtain a copy of the verdict, but we were informed that the court has not yet prepared the summary document,” Gurung wrote. “I want to inform that I will appear in court once I receive the full written verdict from the Supreme Court.”
            <br><br>
            Having already served two years and eight months of his sentence, Gurung still faces two years and four months in prison. Although the Supreme Court has upheld the lower court’s decision, making the full text unnecessary for implementing the sentence, police have launched a search for Gurung, who remains unreachable.
            <br><br>
            Additionally, a separate case questioning Gurung’s eligibility as an MP is currently under consideration in the Supreme Court’s Constitutional Bench.
        </p>
        @include('frontend/advertisements/topads')

    </div>


    <!-- Divider -->
    <div class="border-2 mb-4"></div>


    <!-- Right Sidebar Section -->
    <div class="lg:w-1/3 flex flex-col gap-5 py-1 space-y-5 md:space-y-0 md:space-x-5  px-2 ">
        <h1 class="bg-texthead text-xl rounded p-1 text-center my-5"> Recent Updates</h1>
        <div class="space-y-5">

            <!-- Sidebar Article 1 -->
            <div class="flex flex-col">

                <img class="cursor-pointer w-full sm:w-[80px] md:w-[100px] lg:w-[150px] rounded mb-3"

                    onclick="window.location.href='/detail';" src="{{ asset('assets/images/side.png') }}" alt="Sidebar Image">
                <h2 class="text-sm sm:text-base text-justify font-light md:font-normal lg:font-semibold cursor-pointer py-3 hover:text-texthead"
                    onclick="window.location.href='/detail';">Sports tourism promotes Nepal-China ties Minister Pande
                </h2>
            </div> @include('frontend/advertisements/sideads')

            <div class="border-2"></div>

            <!-- Sidebar Article 2 -->
            <div class="flex flex-col">
                <img class="cursor-pointer w-full sm:w-[120px] md:w-[200px] lg:w-[250px] rounded mb-3"
                    onclick="window.location.href='/detail';" src="{{ asset('assets/images/side.png') }}" alt="Sidebar Image">
                    @include('frontend/advertisements/middleads')
                <h2 class="text-sm sm:text-base md:text-lg font-light md:font-normal lg:font-semibold cursor-pointer py-3 hover:text-texthead"
                    onclick="window.location.href='/detail';">
                    Sports tourism promotes Nepal-China ties: Minister Pande
                </h2>
            </div>


        </div>


    </div>
</div>
</body>

</html>
@endsection
