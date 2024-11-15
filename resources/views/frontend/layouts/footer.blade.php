<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>News-Portal</title>
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
    <div class="w-full bg-primary">

        <div class="flex flex-col sm:py-10 sm:gap-10 md:flex-col md:gap-5 md:px-24 xl:flex-row 3xl:py-20">
            <div class="flex flex-col p-3 gap-3 flex-1 sm:gap-10 sm:justify-evenly mdmd:max-w-[30%]">
                <img class="w-24 rounded" src="{{ asset('assets/images/News_Logo.png') }}" alt="Logo" />
                <p class=" flex text-white font-light w-80">
                    A news portal is an access point to news; This is generally thought of as a Internet connection to a news source but the definition of a “Portal” would include a newspaper, magazine or any other access to news.
                </p>

                <div class="flex space-x-4 mt-2 lg:mt-0">
                    <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="text-white hover:text-blue-600">
                        <i class="fab fa-facebook"></i> <!-- Facebook Icon -->
                    </a>
                    <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" aria-label="Twitter" class="text-white hover:text-blue-400">
                        <i class="fab fa-twitter"></i> <!-- Twitter Icon -->
                    </a>
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="text-white hover:text-pink-600">
                        <i class="fab fa-instagram"></i> <!-- Instagram Icon -->
                    </a>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:gap-2 lg:gap-5 2xl:gap-9 sm:flex-wrap sm:justify-between p-3 mx-10 md:flex-row xl:max-w-[70%] xl:w-full">
                <div class="flex flex-col sm:gap-1 md:gap-5">
                    <h2 class="text-lg text-white  md:text-xl md:font-medium">
                        Quick Links
                    </h2>
                    <p class=" text-sm md:text-base text-white font-light ">About</p>
                    <p class=" text-sm md:text-base text-white font-light">Contact</p>
                    <p class=" text-sm md:text-base text-white font-light">Terms & Conditions</p>
                    <p class=" text-sm md:text-base text-white font-light">Privacy Policy</p>
                </div>

                <div class="flex flex-col md:gap-5">
                    <h2 class="text-lg  md:text-xl md:font-medium text-white">
                        Our Associate
                    </h2>
                    <p class=" text-sm md:text-base text-white font-light">Get Well</p>
                    <p class=" text-sm md:text-base text-white font-light">Cipla</p>
                    <p class=" text-sm md:text-base text-white font-light">Beacon</p>
                    <p class=" text-sm md:text-base text-white font-light">Emsure</p>
                </div>

                <div class="flex flex-col md:gap-5">
                    <h2 class="text-lg  md:text-xl md:font-medium text-white">
                        Contact Us
                    </h2>
                    <div class="relative flex items-center justify-center gap-2">
                        <i class="fas fa-phone text-white mt-1  "></i>
                        <div>
                            <p class=" text-sm md:text-base text-white font-light">
                                +977-01-4422911, +977-01- 443457
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-2 items-center">
                        <i class="fas fa-envelope text-white mt-1 "></i>
                        <div>
                            <p class=" text-sm md:text-base text-white font-light">
                                newsportal2024@admin.com
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-2">
                        <i class="fas fa-map-marker-alt text-white mt-1  "></i>
                        <p class=" text-sm md:text-base text-white font-light">
                            Pipalbot, Kathmandu Nepal
                        </p>
                    </div>
                </div>
            </div>
        </div>



        <div class="justify-center bg-[#F7F7F7] flex flex-col items-center">
            <p class="border-b-2 w-full border-[#000000]"></p>
            <p class="flex justify-items-center items-center gap-2">
                &copy; {{ date('Y') }} Spell News Portal.
                <span>Powered by Spell Innovation</span>
            </p>
        </div>
    </div>
</body>

</html>
