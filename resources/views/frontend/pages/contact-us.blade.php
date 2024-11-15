@extends('frontend.layouts.main')

@section('main-container')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-primary  font-sans">
    <style>
        body {
            font-family: 'Muli', sans-serif;
        }
    </style>
    <div class="my-5 flex flex-col mx-5 lg:mx-32 justify-center">
        <div class="text-center ">
            <h1 class="text-4xl font-bold">Contact Us</h1>
            <p class="my-5 text-gray-400">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Contact Info -->
            <div class="bg-fourth flex flex-col space-y-6">
                <div class="flex items-center space-x-4">
                    <div class="p-4  rounded-full">
                        <i class="fas fa-home "></i>
                    </div>
                    <div>
                        <h2 class="font-bold">Address</h2>
                        <p>
                         Pipalbot, Kathmandu Nepal</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="p-4  rounded-full">
                        <i class="fas fa-phone-alt "></i>
                    </div>
                    <div>
                        <h2 class="font-bold">Phone</h2>
                        <p>+977-01-4422911,+977-01- 443457
                        </p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="p-4  rounded-full">
                        <i class="fas fa-envelope "></i>
                    </div>
                    <div>
                        <h2 class="font-bold">Email</h2>
                        <p>spellnews2024@admin.com</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-primary text-gray-800 p-8 rounded-lg shadow-lg lg:mx-20">
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium">Full Name</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-teal-500 focus:border-teal-500">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-teal-500 focus:border-teal-500">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium">Type your Message</label>
                        <textarea id="message" name="message" rows="4"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-teal-500 focus:border-teal-500"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-teal-500  py-2 rounded-md hover:bg-teal-600">Send</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
